<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\SendContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $name = $request->input('name');
        $firstname = $request->input('firstname');
        $phone_number = $request->input('phone_number');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');
        
        // dd($request->input('name'),$request->input('firstname'),$request->input('phone_number'),$request->input('email'),$request->input('subject'),$request->input('message'));

        Mail::to("home@work4connect.com")->send(new SendContactMail($name, $firstname, $phone_number, $email, $subject, $message));

        return redirect()->route('contact')->with('success_contact', trans('success.messagesen'));
    }
}
