<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Categories\Commands\UpdateCategoryCommand;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepositoryInterface;

class UpdateCategoryCommandHandler
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categories;

    public function __construct(CategoryRepositoryInterface $categories)
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

        return $this->categories->update($category, $command->attributes);
    }
} 
