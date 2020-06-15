<?php

namespace App\Listeners;

use App\Events\pengajarEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class updateListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(pengajarEvent $event)
    {
        $pengajar = $event->pengajar;
        $guru = $pengajar->where('id', session('update'))->get()->all();
        $guru[0]->update([
            "status" => "aktiv"
        ]);
    }
}
