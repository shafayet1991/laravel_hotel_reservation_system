<?php

namespace App\Jobs\Reservation;

use App\Mail\NewReservationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class NewReservationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mails = [
            $this->data['person_email'],
            'umituz998@gmail.com',
            'serkanboztepe02@gmail.com',
            'sales@halalhotelcheck.com',
        ];

        Mail::to($mails)->send(new NewReservationMail($this->data));

    }
}
