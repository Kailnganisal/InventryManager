<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function index(){
        logger(response()->json(auth()->user()));
        return response()->json(auth()->user());
    }
}
