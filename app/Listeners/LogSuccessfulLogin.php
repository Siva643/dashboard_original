<?php

namespace App\Listeners;

use App\Models\Information;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
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
    public function handle(object $event): void
    {
        $information = Information::first();

        if (blank($information)) {
            $information = new Information();
        }

        $information->login_count++;

        $information->save();
    }
}
