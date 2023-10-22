<?php

namespace App\Jobs;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $to;
    protected $title;
    protected $body;
    /**
     * Create a new job instance.
     */
    public function __construct($to,$title,$body)
    {
        $this->to = $to;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $smtp_host = json_decode(Setting::select('host')->first(),true);
        $smtp_port = json_decode(Setting::select('port')->first(),true);
        $smtp_username = json_decode(Setting::select('username')->first(),true);
        $smtp_password = json_decode(Setting::select('password')->first(),true);

        $host = $smtp_host['host'];
        $port = $smtp_port['port'];
        $username = $smtp_username['username'];
        $password = $smtp_password['password'];

        $transport = (new Swift_SmtpTransport($host,$port,'tls'))
            ->setUsername($username)
            ->setPassword($password);
        $mailer = new Swift_Mailer($transport);

        $message = (new Swift_Message($this->title))
            ->setFrom('contact@sha-yan.com')
            ->setTo($this->to)
            ->setBody($this->body);

        $mailer->send($message);
    }
}
