<?php

namespace App\Listeners;

use App\Events\PklApplicationSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateRegistrationNumber
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  PklApplicationSubmitted  $event
     * @return void
     */
    public function handle(PklApplicationSubmitted $event)
    {
        // Generate registration number
        $registrationNumber = 'REG-' . str_pad($event->user->id, 4, '0', STR_PAD_LEFT);

        // Update user with registration number
        $event->user->registration_number = $registrationNumber;
        $event->user->save();
    }
}
