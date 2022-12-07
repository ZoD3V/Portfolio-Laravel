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
        $cv = CV::orderBy('id',)->get();
        return view('backend.cv.index', compact('cv'));
    }

    public function process(Request $request){
        
    }
}
