<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function send(Request $request) {
        $message = $request->message;
        $from = $request->email;
        $subject = $request->subject;
        $headers  = "From: " . "$from" . "\r\n";
        $headers .= "Reply-To: " . "$from" . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $email = new Email();
        $email->message = $message;
        $email->from = $from;
        $email->subject = $subject;
        $email->save();

        mail('slumdweller@slumdweller.band', $subject,$message,$headers);
        return view('pages.thank-you');
    }
    public function reply(Request $request) 
    {
        $message = "<p>" . $request->message . "</p>";
        $to = $request->to;
        $subject = $request->subject;
        $headers  = "From: " . "Slumdweller" . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        mail($to, $subject,$message,$headers);
    }
    public function delete(Request $request) 
    {
        Email::where('id', $request->id)->delete();
        return redirect()->route('admin.mail');
    }
}
