<?php

namespace App\Http\Controllers;

use App\Mail\ContactUS;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //
    function store(Request $request){

        $new_mail = Contact::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'company' => $request->company,
            'message' => $request->message,
        ]);

        Mail::mailer()
        ->to(Auth::user()->email)
        ->send(new ContactUS($new_mail));

        return redirect('/index');
    }
}
