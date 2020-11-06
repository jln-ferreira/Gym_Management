<?php

namespace App\Http\Controllers;



use App\MailContact;

use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use Illuminate\Http\Request;

class mailController extends Controller
{
    public function mailContact(Request $request)
    {
        $data = array(
            'name'    => $request['name'],
            'email'   => $request['email'],
            'comments'=> $request['comments']
        );

        Mail::to('jln-ferreira@outlook.com')->send(new sendEmail($data));

        return "Thank you for your contact! Oss!";
    }
}
