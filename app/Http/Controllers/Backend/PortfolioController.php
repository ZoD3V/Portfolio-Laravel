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

    public function index()
    {
        $portfolio = Portfolio::get();
        return view('backend.portfolio.index', compact('portfolio'));
    }

    public function create()
    {
        return view('backend.portfolio.create');
    }

    public function create_process(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'image' => 'required|max:2048|mimes:jpg,jpeg,png',
            'description' => 'required',
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/portfolio'), $image);

        Portfolio::create([
            'title' =>  $request->title,
            'image' => $image,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('backend.manage.portfolio')
            ->with('success', 'Item Created Successully');
    }
}
