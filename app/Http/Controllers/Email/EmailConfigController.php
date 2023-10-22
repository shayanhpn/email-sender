<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Swift_Mailer;
use Swift_SmtpTransport;
use Swift_TransportException;

class EmailConfigController extends Controller
{
    public function showEmailConfig()
    {
        $setting = Setting::firstOrCreate();
        return view('app.email-setting',compact('setting'));
    }

    public function setEmailConfig(Request $request)
    {
        $settingFields = $request->validate([
            'mailer' => ['required','in:smtp'],
            'host' => ['required'],
            'port' => ['required'],
            'username' => ['required'],
            'password' => ['required']
        ]);
        $setting = Setting::first();
        if($setting === null)
        {
            Setting::create($settingFields);
        }
        else
        {
            $setting->update($settingFields);
        }
        return 'Done';
    }
}
