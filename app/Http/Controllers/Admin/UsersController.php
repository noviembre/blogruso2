<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserUpdate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users'   =>  $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        #-------------------------------------------------
        #fuente:
        #https://laravel.com/docs/5.5/validation#rule-file
        #ejemplo:
        #The file under validation must be an image
        #lo utiza para la imagen
        #--------------------------------------------------

        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  'required|email|unique:users',
            'password'  =>  'required',
            'avatar'    =>  'nullable|image'
        ]);

        $user = User::add($request->all());

        $user->uploadAvatar($request->file('avatar'));
        return redirect()->route('users.index');
    }



    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserUpdate $request)
    {
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();


        if (!empty($request['password'])){

            if (!(Hash::check($request['password'], Auth::user()->password))){
                return redirect()->back()->with('error','Your Current Password does not match with the pass you provide');
            }

            if (strcmp($request['password'], $request['new_password']) == 0){
                return redirect()->back()->with('error','New pass cannot be same as your current password');

            }

            $validation = $request->validate([
                'password'  =>  'required',
                'new_password'  =>  'required|string|min:5'
            ]);

            $user->password = bcrypt($request['new_password']);
            $user->save();
            return redirect()->route('users.index');

        }

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->remove();
        return redirect()->route('users.index');
    }
}
