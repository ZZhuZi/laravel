<?php

namespace App\Listeners;

use App\Events\RegisterSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreaterInvite
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
     * @param  RegisterSuccess  $event
     * @return void
     */
    public function handle(RegisterSuccess $event)
    {
        //
    }
}
