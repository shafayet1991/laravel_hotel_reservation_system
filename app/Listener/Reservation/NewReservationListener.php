<?php

namespace App\Listener\Reservation;

use App\Events\Reservation\NewReservationEvent;
use App\Mail\NewReservationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class NewReservationListener
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
     * @param  NewReservationEvent  $event
     * @return void
     */
    public function handle(NewReservationEvent $event)
    {
        $data = $event->getData();
        $mails = [
            $data['person_email'],
            'umituz998@gmail.com',
            'serkanboztepe02@gmail.com',
            'sales@halalhotelcheck.com',
        ];

        Mail::to($mails)->send(new NewReservationMail($data));
    }
}
