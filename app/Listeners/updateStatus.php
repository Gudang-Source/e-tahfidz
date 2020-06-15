<?php

namespace App\Listeners;

use App\Events\hapusKelas;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class updateStatus
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
    public function handle(hapusKelas $event)
    {
        $pengajar = $event->pengajar;
        $ubah = $pengajar->where('id', session('data'))->get()->all();
        $ubah[0]->update([
            "status" => "non-aktiv"
        ]);
    }
}
