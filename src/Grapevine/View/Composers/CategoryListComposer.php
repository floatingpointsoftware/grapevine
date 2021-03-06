<?php
namespace FloatingPoint\Grapevine\View\Composers;

use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;
use Illuminate\Contracts\View\View;

class CategoryListComposer
{
    /**
     * @var CategoryRepository
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
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories->getAll());
    }
}
