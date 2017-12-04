<?php

namespace App\Listeners;

use App\Events\InterpretAtConcert;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class InterpretAtConcertListener
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
     * @param InterpretAtConcert|object $event
     * @return void
     */
    public function handle(InterpretAtConcert $event)
    {
        $interpretName = $event->interpretAtConcertItem->getName();
        $userInterpretItems = $event->interpretAtConcertItem->getFollowers();
        dd($userInterpretItems);
//        foreach ($emailAddresses as $emailAddress)
//        {
//            \Mail::send('emails.projectEdited', ['interpretName' => $interpretName], function ($message) use($emailAddress)
//            {
//                $message->from('notification@iis-project55.com', 'xillic00');
//                $message->to($emailAddress);
//            });
//        }
    }
}
