<?php
namespace FloatingPoint\Grapevine\View\Composers;

use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepositoryInterface;
use Illuminate\Contracts\View\View;

class CategoryListComposer
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
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories->getAll());
    }
}
