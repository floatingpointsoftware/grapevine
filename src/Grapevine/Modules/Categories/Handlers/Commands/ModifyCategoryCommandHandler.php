<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Modules\Categories\Commands\ModifyCategoryCommand;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;

class ModifyCategoryCommandHandler
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
     * @param UpdateCategoryCommand $command
     * @return Resource
     */
    public function handle(ModifyCategoryCommand $command)
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
