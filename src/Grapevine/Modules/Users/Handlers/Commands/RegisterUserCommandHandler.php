<?php
namespace FloatingPoint\Grapevine\Modules\Users\Handlers\Commands;

use FloatingPoint\Grapevine\Library\Events\Dispatcher;
use FloatingPoint\Grapevine\Modules\Users\Commands\RegisterUserCommand;
use FloatingPoint\Grapevine\Modules\Users\Data\User;
use FloatingPoint\Grapevine\Modules\Users\Repositories\UserRepositoryInterface;

class RegisterUserCommandHandler
{
    use Dispatcher;

    /**
     * @var UserRepositoryInterface
     */
    private $users;

    /**
     * @param UserRepositoryInterface $users
     */
    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * @param RegisterUserCommand $command
     */
    public function handle(RegisterUserCommand $command)
    {
        $user = User::register($command->username, $command->email, $command->password);

        $this->users->save($user);

        $this->dispatch($user->releaseEvents());
    }
}