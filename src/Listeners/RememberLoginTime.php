<?php

namespace MantasDone\LaravelLogout\Listeners;

use App\Events\Audio\Transcription\Finished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RememberLoginTime
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
     * @return void
     */
    public function handle()
    {
        session()->set('login_time', time());
    }
}
