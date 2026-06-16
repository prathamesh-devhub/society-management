<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function hello()
    {
        return 'Hello From Controller';
    }

    public function about()
    {
        return view('test', [
            'content' => 'This is about the society management system. It is designed to help manage various aspects of a society, including member information, events, and communication.'
        ]);
    }
}
