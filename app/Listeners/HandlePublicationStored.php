<?php

namespace App\Listeners;

use App\Events\PublicationStoredEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HandlePublicationStored
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
     * @param  PublicationStoredEvent  $event
     * @return void
     */
    public function handle(PublicationStoredEvent $event)
    {
        //
    }
}
