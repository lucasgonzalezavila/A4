<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Auth\Events\Registered;

class AddFreeSubscription
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $event->user;
        
        $user->subscriptions()->create([
            'is_active' => true,
            'start_date' => now(),
            'end_date' => now()->addDays(30)
        ]);
    }
}
