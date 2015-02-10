<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Events\Dispatcher;
use FloatingPoint\Grapevine\Modules\Categories\Commands\CreateCategoryCommand;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryFactory;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepositoryInterface;

class CreateCategoryCommandHandler
{
    use Dispatcher;

    /**
     * @var CategoryRepository
     */
    private $categories;

    /**
     * @var CategoryFactory
     */
    private $factory;

    /**
     * @param CategoryRepositoryInterface $categories
     */
    public function __construct(CategoryRepositoryInterface $categories, CategoryFactory $factory)
    {
        $this->categories = $categories;
        $this->factory = $factory;
    }

    /**
     * Handle the command, creating a new category record and returning the result.
     *
     * @param CommandInterface $command
     * @return Category
     */
    public function handle(CreateCategoryCommand $command)
    {
        $category = $this->factory->create($command->title, $command->description);

        $this->categories->save($category);

        $this->dispatch($category->releaseEvents());
    }
}
