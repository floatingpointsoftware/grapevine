<?php
namespace FloatingPoint\Grapevine\Modules\Topics\Data;

use FloatingPoint\Grapevine\Modules\Topics\Events\TopicWasStarted;

class TopicFactory
{
    public function executeUnguarded($class, \Closure $callback)
    {
        $class::unguard();
        $result = $callback();
        $class::reguard();
        return $result;
    }

    /**
     * Create a new topic instance based on the required data.
     *
     * @param integer $categoryId
     * @param integer $userId
     * @param string $title
     * @return Topic
     */
    public function start($category, $userId, $title)
    {
        $topic = $this->executeUnguarded(Topic::class, function() use($category, $userId, $title) {
            return new Topic([
                'category_id' => $category->id,
                'user_id' => $userId,
                'title' => $title
            ]);
        });

        $topic->raise(new TopicWasStarted($topic));

        return $topic;
    }
}
