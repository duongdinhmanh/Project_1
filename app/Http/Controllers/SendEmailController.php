<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use APP\Models\Apartment;

class SendEmailController extends Controller
{

    public function follow(Request $request)
    {
        $newProduct = Apartment::where('status', 1)->take(10)->orderBy('id', 'DESC')->get();

        $data = array('email' => $req->email);
        Mail::send('emails.welcome', $data, function ($smg) use ($data) {
            $smg->from('duongdinhmanh252@gmail.com', 'X-sopping');
            $smg->to($data['email'], 'visitor');
            $smg->subject('This is Mail X-Sopping');
        });
        $time = 21 * 60 * 60;
        dispatch(new SendMailForDues($request->all()))->delay(now()->addSeconds($time));
    }
}
