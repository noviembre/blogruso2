<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        return view('pages.profile', ['user'	=>	$user]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'	=>	'required',
            'email' =>  [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
            'avatar'	=>	'nullable|image'
        ]);

        echo 'ok';
    }
}
