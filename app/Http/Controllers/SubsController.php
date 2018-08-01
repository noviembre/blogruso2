<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubsController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email'	=>	'required|email|unique:subscriptions'
        ]);

        $subs = Subscription::add($request->get('email'));

        return redirect()->back()
            ->with('notification_newsletter','Thanks for subscribing!');
    }
}
