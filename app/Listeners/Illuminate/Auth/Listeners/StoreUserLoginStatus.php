<?php

namespace App\Listeners;

use App\Events\LoginStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreUserLoginStatus
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
     * @param  LoginStatus  $event
     * @return void
     */
    public function handle(LoginStatus $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $userinfo = $event->user;

        $saveStatus = DB::table('login_status')->insert(
            [
                'full_name' => $userinfo->full_name, 
                'email' => $userinfo->email, 
                'created_at' => $current_timestamp, 
                'updated_at' => $current_timestamp
            ]
        );
        return $saveStatus;
    }
}
