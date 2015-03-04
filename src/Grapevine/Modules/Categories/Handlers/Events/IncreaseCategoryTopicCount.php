<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Handlers\Events;

use FloatingPoint\Grapevine\Modules\Discussions\Events\DiscussionWasStarted;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;

class IncreaseCategoryDiscussionCount
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
	 * @param DiscussionWasStarted $discussion
     */
	public function handle(\FloatingPoint\Grapevine\Modules\Discussions\Events\DiscussionWasStarted $discussion)
	{
		$this->categories->increaseDiscussionCount($discussion->categoryId);
	}
}
