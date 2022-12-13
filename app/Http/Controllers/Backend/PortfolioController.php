<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id = null)
    {

        // $show_portfolio = Portfolio::where('id', $id)->get();
        // $on_show = false;
        $portfolio = Portfolio::get();
        return view('backend.portfolio.index', compact('portfolio'));
    }

    public function show($id = null)
    {
        if ($id == null) {
            return redirect()->route('backend.manage.portfolio')->with('error', "The Id is Empty");
        } else {
            $portfolio = Portfolio::find($id);
            return view('backend.portfolio.show', compact('portfolio'));
        };
    }

    public function create()
    {
        return view('backend.portfolio.create');
    }

    public function edit($id)
    {
        $portfolio = portfolio::where('id', $id)->get();
        return view('backend.portfolio.edit', compact('portfolio'));
    }

    public function edit_process(Request $request, $id)
    {
        request()->validate([
            'title'         => 'required',
            'image'         => 'required|max:2048|mimes:jpg,jpeg,png',
            'description'   => 'required'
        ]);

        $old_image = portfolio::select('image')->where('id', $id)->first();
        unlink(public_path('portfolio/' . $old_image->image));

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('portfolio'), $image);


        portfolio::where('id', $id)->update(([
            'title'         => $request->title,
            'image'         => $image,
            'description'   => $request->description
        ]));

        return redirect()
            ->route('backend.manage.portfolio')
            ->with('success', 'Item Created Successfully');
    }


    public function create_process(Request $request)
    {
        request()->validate([
            'title'         => 'required',
            'image'         => 'required|max:2048|mimes:jpg,jpeg,png',
            'description'   => 'required'
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('portfolio'), $image);


        portfolio::create([
            'title'         => $request->title,
            'image'         => $image,
            'description'   => $request->description
        ]);

        return redirect()
            ->route('backend.manage.portfolio')
            ->with('success', 'Item Created Successfully');
    }


    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        if (public_path('portfolio/' . $portfolio->image))
            unlink(public_path('portfolio/' . $portfolio->image));

        $portfolio->delete();

        return redirect()
            ->route('backend.manage.portfolio')
            ->with('success', 'Item Created Successfully');
    }
}
