<?php
namespace FloatingPoint\Grapevine\Library\Events;

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
     * @param object $event
     */
    public function raise($event)
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
