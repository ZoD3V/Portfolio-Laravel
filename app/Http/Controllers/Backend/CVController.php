<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CV;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cv = CV::find(1);
        return view('backend.cv.index', compact('cv'));
    }

    public function process(Request $request)
    {
        request()->validate([
            'filename' => 'required|max:2048|mimes:pdf',
        ]);

        $filename = time() . '.' . $request->filename->extension();
        $request->filename->move(public_path('cv/'), $filename);

        $cv = CV::find(1);

        if (file_exists(public_path('cv/' . $cv->filename)))
            unlink(public_path('cv/' . $cv->filename));

        $cv->save();

        return redirect()
            ->route('backend.manage.cv')
            ->with('success', 'cv created successfully.');
    }
}
