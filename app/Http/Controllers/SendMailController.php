<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Mail;

class SendMailController extends Controller
{
      public function sendMail()
      {
          $isi = [
          'title'=> 'Itsolutionstuff.com mail',
          'body'=> 'The body of your message.',
          'button' => 'Click Here'
          ];
          $receiverAddress = 'rully.arfan@gmail.com';
          Mail::to($receiverAddress)->send(new OrderShipped($isi));
          dd('mail send successfully');
      }
}
