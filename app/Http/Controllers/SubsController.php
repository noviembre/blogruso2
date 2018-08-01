<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
Use App\Mail\SubscribeEmail;

class SubsController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email'	=>	'required|email|unique:subscriptions'
        ]);

        $subs = Subscription::add($request->get('email'));

        $subs->generateToken();

        // https://laravel.com/docs/5.5/mail#sending-mail
        // in laravel find this code:
        // Mail::to($request->user())->send(new OrderShipped($order));
        #==== este codigo de /Mail tbn pertenece a este commit

        \Mail::to($subs)->send(new SubscribeEmail($subs));

        return redirect()->back()
            ->with('notification_newsletter','Thanks for subscribing!');
    }

    public function verify($token)
    {
        $subs = Subscriptikon::where('token', $token)->firstOrFail();
        $subs->token = null;
        $subs->save();
        return redirect('/')
            ->with('notification_newsletter', 'Your E-Mail was verificated!');
    }

}
