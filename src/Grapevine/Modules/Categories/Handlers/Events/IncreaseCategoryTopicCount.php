<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Handlers\Events;

use FloatingPoint\Grapevine\Modules\Topics\Events\TopicWasStarted;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;

class IncreaseCategoryTopicCount
{
	/**
	 * @var CategoryRepository
	 */
	private $categories;

	/**
	 * @param CategoryRepository $categories
     */
	function __construct(CategoryRepository $categories)
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
