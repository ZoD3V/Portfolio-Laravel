<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::orderBy('id',)->get();
        return view('frontend.about.index', compact('about'));
    }

    public function download_cv()
    {
        return Response::download(public_path('cv/Muhammad AdhiNugroho.pdf'));
    }

    public function about()
    {
        return view('backend.about.about');
    }

    public function process(Request $request)
    {
        $rule = [
            'title' => 'required',
            'desc' => 'required',
        ];

        $message = [
            'title.required' => 'The Field <strong>name</strong> is requierd!',
            'desc.required' => 'The Field <strong>slug</strong> is requierd!',
        ];

        $validator = Validator::make($request->all(), $rule, $message);

        if ($validator->fails()) {
            return redirect()->route('backend.about.about')->withErrors($validator)->withInput();
        } else {
            About::where('id', '1')->update([
                'title' => $request->title,
                'desc' => $request->desc,
            ]);
            $pesan = "Hi {$request->title}, success";
            return redirect()->route('backend.about.about')->with('success', $pesan);
        };
    }
}
