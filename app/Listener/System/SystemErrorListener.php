<?php

namespace App\Listener\System;

use App\Events\System\SystemErrorEvent;
use App\Mail\System\SystemErrorMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SystemErrorListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SystemErrorEvent  $event
     * @return void
     */
    public function handle(SystemErrorEvent $event)
    {
        $data['message'] = $event->getData()->getMessage();
        $data['file'] = $event->getData()->getFile();
        $data['code'] = $event->getData()->getCode();
        $data['line'] = $event->getData()->getLine();
        $mails = [
            'umituz998@gmail.com',
            'serkanboztepe02@gmail.com',
        ];

        Mail::to($mails)->send(new SystemErrorMail($data));
    }
}
