<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Http\Requests\Categories\CreateCategoryRequest;
use FloatingPoint\Grapevine\Http\Requests\Categories\UpdateCategoryRequest;
use FloatingPoint\Grapevine\Library\Slugs\Slug;
use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Categories\Commands\CreateCategoryCommand;
use FloatingPoint\Grapevine\Modules\Categories\Commands\UpdateCategoryCommand;
use FloatingPoint\Grapevine\Modules\Categories\Data\Category;
use FloatingPoint\Grapevine\Modules\Categories\Data\CategoryRepository;

class CategoryController extends Controller
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
     * Retrieve a list of categories and return a view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = $this->categories->getAll();

        return $this->respond('category.index', compact('categories'));
    }

    /**
     * Render the category creation form.
     *
     * @return mixed
     */
    public function create()
    {
        $category = new Category;

        return $this->respond('category.create', compact('category'));
    }

    public function show($slug)
    {
        $category = $this->categories->getBySlug($slug);

        return $this->respond('category.show', compact('category'));
    }

    /**
     * Stores a new category
     *
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateCategoryRequest $request)
    {
        $this->dispatch(new CreateCategoryCommand(
            $request->get('parent_id', null),
            $request->get('title'),
            $request->get('description')
        ));

        return redirect()->route('category.index');
    }

    /**
     * Edit a specific category based on its slug.
     *
     * @param string $slug
     * @return mixed
     */
    public function edit($slug)
    {
        $category = $this->categories->requireBySlug($slug);

        return $this->respond('category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request)
    {
        $this->dispatch(new UpdateCategoryCommand($request->get('id'), $request->only(['title','description'])));

        return redirect()->route('category.show', [Slug::fromTitle($request->get('title'))]);
    }

    public function destroy($slug)
    {
        $category = $this->categories->getBySlug($slug);
        $this->categories->delete($category);

        return redirect()->route('category.index');
    }
}
