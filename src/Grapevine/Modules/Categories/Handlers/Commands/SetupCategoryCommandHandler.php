<?php
namespace FloatingPoint\Grapevine\Modules\Categories\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Events\Dispatcher;
use FloatingPoint\Grapevine\Modules\Categories\Commands\SetupCategoryCommand;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryFactory;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;

class SetupCategoryCommandHandler
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
     * @param CategoryRepository $categories
     */
    public function __construct(CategoryRepository $categories, CategoryFactory $factory)
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
    public function handle(SetupCategoryCommand $command)
    {
        $category = $this->factory->create($command->title, $command->description);

        $this->categories->save($category);

        $this->dispatch($category->releaseEvents());
    }
}
