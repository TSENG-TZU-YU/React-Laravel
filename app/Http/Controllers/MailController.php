<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
use App\Models\Email;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $mailData = [
            'mail' => $data['mail'],
            'money' => $data['money'],
            'result' => $data['result']
        ];

        Mail::to($data['mail'])->send(new DemoMail($mailData));
        Email::create($data);
        // dd("Email is sent successfully.");
        // return "success";
    }

}