<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        dd($user);
        return view('pages.profile', ['user'	=>	$user]);
    }
}
