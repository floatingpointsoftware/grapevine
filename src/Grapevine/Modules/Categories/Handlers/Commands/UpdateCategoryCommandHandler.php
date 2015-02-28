<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Modules\Categories\Commands\UpdateCategoryCommand;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;

class UpdateCategoryCommandHandler
{
    /**
     * @var CategoryRepository
     */
    private $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Handle the command, retrieving the category and returning the result of the update operation
     *
     * @param Command $command
     * @return Resource
     */
    public function handle(UpdateCategoryCommand $command)
    {
        $category = $this->categories->getById($command->id);

        if(! empty($command->attributes['title'])) {
            $category->title = $command->attributes['title'];
            $category->slug = Slug::fromTitle($command->attributes['title']);
        }

        $category->description = $command->attributes['description'] ?: $category->description;

        return $this->categories->update($category, $command->attributes);
    }
} 
