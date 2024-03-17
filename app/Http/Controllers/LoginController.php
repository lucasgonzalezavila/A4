<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class LoginController extends Controller{
    public function index(){
        $Users = Users::all(); 
        return view('login', ['Users' => $Users]);
    }
}
