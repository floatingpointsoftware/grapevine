<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Handlers\Events;

use FloatingPoint\Grapevine\Modules\Topics\Events\TopicWasStarted;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepositoryInterface;

class IncreaseCategoryTopicCount
{
	/**
	 * @var CategoryRepositoryInterface
	 */
	private $categories;

	/**
	 * @param CategoryRepositoryInterface $categories
     */
	function __construct(CategoryRepositoryInterface $categories)
	{
		$this->categories = $categories;
	}

	/**
	 * @param TopicWasStarted $topic
     */
	public function handle(\FloatingPoint\Grapevine\Modules\Topics\Events\TopicWasStarted $topic)
	{
		$this->categories->increaseTopicCount($topic->categoryId);
	}
}
