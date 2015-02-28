<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Handlers\Commands;

use FloatingPoint\Grapevine\Modules\Categories\Commands\DeleteCategoryCommand;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;

class DeleteCategoryCommandHandler
{
    /**
     * @var
     */
    private $categories;

    /**
     * @param CategoryRepository $categories
     */
    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Handle the command, retrieving the category and returning hte result of the delete operation
     *
     * @param CommandInterface $command
     * @return bool
     */
    public function handle(DeleteCategoryCommand $command)
    {
        $category = $this->categories->requireById($command->id);

        return $this->categories->delete($category);
    }
} 
