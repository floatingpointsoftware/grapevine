<?php
namespace FloatingPoint\Grapevine\Modules\Discussions\Data;

use FloatingPoint\Grapevine\Modules\Discussions\Events\DiscussionWasStarted;

class DiscussionFactory
{
    /**
     * @param          $class
     * @param callable $callback
     * @return mixed
     */
    public function executeUnguarded($class, \Closure $callback)
    {
        $class::unguard();
        $result = $callback();
        $class::reguard();
        return $result;
    }

    /**
     *
     * Create a new discussion instance based on the required data.
     *
     * @param         $category
     * @param integer $userId
     * @param string  $title
     * @return Discussion
     */
    public function start($category, $userId, $title)
    {
        $discussion = $this->executeUnguarded(Discussion::class, function() use($category, $userId, $title) {
            return new Discussion([
                'category_id' => $category->id,
                'user_id' => $userId,
                'title' => $title
            ]);
        });

        $discussion->raise(new DiscussionWasStarted($discussion));

        return $discussion;
    }
}
