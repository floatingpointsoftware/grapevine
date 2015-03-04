<?php
namespace FloatingPoint\Grapevine\View\Composers;

use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;
use Illuminate\Contracts\View\View;

class CategorySelectComposer
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
     * @param View $view
     */
    public function compose(View $view)
    {
        $categories = $this->categories->getAll();
        $removeCategory = isset($view->category) ? $view->category->id : null;

        if ($categories->count()) {
            $view->with('categories', $categories->forSelect($removeCategory));
        }
    }
}
