<?php
namespace FloatingPoint\Grapevine\Library\Events;

use App\Events\Event;

trait Raiseable
{
    /**
     * Store raised events within the array.
     *
     * @var array
     */
	protected $events = [];

    /**
     * Raise a new event that will be released and fired later.
     *
     * @param Event $event
     */
    public function raise(Event $event)
    {
        $this->events[] = $event;
    }

    /**
     * Release all events, and return any that have been queued.
     *
     * @return array
     */
    public function releaseEvents()
    {
        $events = $this->events;

        $this->events = [];

        return $events;
    }
}
