<?php

namespace App\Listeners;

use App\Events\t_pengajarEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
class t_pengajarListener
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
    public function handle(t_pengajarEvent $event)
    {
        $User = $event->User;
         $User->create([
            "nama" => session('nama'),
            "email" => session('email'),
            "no_telp" => session('no_telp'),
            "alamat" => session('alamat'),
            "password" => bcrypt(session('password')),
            "role" => "pengajar"
        ]);
    }
}
