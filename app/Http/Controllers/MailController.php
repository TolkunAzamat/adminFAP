<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MyNotification;
use Exception;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    //
    // public function sendMail()
    // {
    //     $data = [
    //         'subject'=>'FAP Info',
    //         'body'=>'This is the mail FAP'
    //     ];
    //     try
    //     {
    //         Mail::to('toshazamat@gmail.com')->send(new MailNotify($data));
    //         return response()->json(['Great check your mail box']);
    //     }
    //     catch(Exception $th){
    //         return response()->json(['Ops']);

    //     }
    // }
}
