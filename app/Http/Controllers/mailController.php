<?php

namespace App\Http\Controllers;



use App\MailContact;

use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail_prescheduling;
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

    public function mailPrescheduling(Request $request){
        $data = array(
            'weight'      => $request['weight'],
            'gender'      => $request['gender'],
            'phonenumber' => $request['phonenumber'],
            'gym'         => $request['gym'],
            'rank'        => $request['rank'],
            'CheckAgree'  => $request['CheckAgree'],
            'CheckRead'   => $request['CheckRead'],
            'name'        => $request['name'],
            'email'       => $request['email'],
            'division'    => $request['division'],
            'belt'        => $request['belt'],
        );

        Mail::to('jln-ferreira@outlook.com')->send(new sendEmail_prescheduling($data));

        return "Thank you for your PRE SCHEDULING! Oss!";
    }
}
