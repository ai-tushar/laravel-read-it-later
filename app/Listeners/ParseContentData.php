<?php

namespace App\Listeners;

use App\Events\ContentSaved;
use App\Jobs\ParseContentData as ParseContentDataJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ParseContentData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Handle the event.
     *
     * @param  ContentSaved  $event
     * @return void
     */
    public function handle(ContentSaved $event)
    {
        ParseContentDataJob::dispatch($event->content);
    }
}
