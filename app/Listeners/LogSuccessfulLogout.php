<?php

namespace App\Listeners;

use App\Models\Information;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogout
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
            return;
        }

        if($information->login_count > 0) {
            $information->login_count--;
    
            $information->save();
        }
    }
}
