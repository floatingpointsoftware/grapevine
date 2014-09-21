<?php

namespace FloatingPoint\Http\Controllers;

use FloatingPoint\Grapevine\Http\Requests\Forums\CreateForumRequest;
use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Categories\Services\CategoryService;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * @param CategoryService $forumService
     */
    public function __construct(CategoryService $forumService)
    {
        $this->categoryService = $forumService;
    }

    /**
     * Retrieve a list of forums and return a view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('forum.index',
            ['forums' => $this->categoryService->getForumList($this->request->all())]);
    }

    public function store(CreateForumRequest $request)
    {
        $this->categoryService->createForum($request->all());

        return redirect();
    }
}
