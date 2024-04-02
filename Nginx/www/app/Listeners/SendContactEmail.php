<?php

namespace App\Listeners;

use App\Events\ContactSaved;
use App\Mail\ContactSavedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactEmail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactSaved $event): void
    {
        $contactData = $event->contact;
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactSavedMail($contactData));
    }
}
