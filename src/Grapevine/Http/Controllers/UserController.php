<?php
namespace FloatingPoint\Grapevine\Http\Controllers;

use FloatingPoint\Grapevine\Library\Support\Controller;
use FloatingPoint\Grapevine\Modules\Users\Data\UserRepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesCommands;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $users;

    /**
     * @param UserService $userService
     */
    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Retrieve a list of users and return a view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = $this->users->getAll();

        return $this->respond('user.index', compact('users'));
    }

    /**
     * For modifying users, as an admin.
     *
     * @internal param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        $this->dispatch(new CreateUserCommand);

        return redirectTo('home');
    }

    /**
     * Load the form necessary for editing a user.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = $this->userService->getUserById($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Renders a registration form for the user.
     *
     * @return \Illuminate\View\View
     */
    public function getRegister()
    {
        return view('user.register');
    }

	/**
	 * Handle the data passed in via the user for registration.
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
    public function postRegister()
    {
        $this->userService->registerUser(Request::all());

        return redirectTo('home');
    }
}
