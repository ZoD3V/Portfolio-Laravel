<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact.index');
    }

    public function process(Request $request)
    {
        $rule = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ];  

        $message =[
            'nama.required' => 'The Field <strong>name</strong> is requierd!',
            'email.required' => 'The Field <strong>slug</strong> is requierd!',
            'phone.required' => 'The Field <strong>slug</strong> is requierd!',
            'message.required' => 'The Field <strong>slug</strong> is requierd!',
        ];  

        $validator = Validator::make($request->all(), $rule, $message);

        if ($validator->fails()) {
            return redirect()->route('frontend.contact.index')->withErrors($validator)->withInput();
        } else {
            $pesan = "Hi <strong>{$request->name}</strong>, thank you for contacting us";
            return redirect()->route('frontend.contact.index')->with('success', $pesan);

        };
        


    }
}
