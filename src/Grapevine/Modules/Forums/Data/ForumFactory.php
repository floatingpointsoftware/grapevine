<?php
namespace FloatingPoint\Grapevine\Modules\Forums\Data;

class ForumFactory
{
	public function create($title, $description)
    {
        $forum = new Forum;
        $forum->title = $title;
        $forum->description = $description;

        $forum->raise(new ForumWasCreated($forum));

        return $forum;
    }
}
