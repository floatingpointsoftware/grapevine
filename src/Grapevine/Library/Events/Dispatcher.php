<?php
namespace FloatingPoint\Grapevine\Library\Events;

use Event;

trait Dispatcher
{
    /**
     * Loop through all events and fire them.
     *
     * @param array $events
     */
    public function dispatch(array $events)
    {
        foreach ($events as $event) {
            Event::fire($event);
        }
    }
}
