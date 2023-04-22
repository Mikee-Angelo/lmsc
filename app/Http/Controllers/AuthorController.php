<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function show() { 
        return view('author.show');
    }
}
