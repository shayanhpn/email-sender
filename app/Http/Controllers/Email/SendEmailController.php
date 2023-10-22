<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Setting;
use Illuminate\Http\Request;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SendEmailController extends Controller
{
    public function showSendMail()
    {
        $smtp_host = Setting::select('host')->first();
        return view('app.main-page',compact('smtp_host'));
    }

    public function sendEmail(Request $request)
    {
        $emailFields = $request->validate([
            'to' => ['required'],
            'title' => ['required'],
            'body' => ['required']
        ]);
        dispatch(new SendEmailJob($emailFields['to'],$emailFields['title'],$emailFields['body']));
        return back()->with('success','انجام شد');
    }
}
