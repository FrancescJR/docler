<?php
declare(strict_types=1);

namespace Cesc\Docler\Stubs\Domain\User;


use Cesc\Docler\Domain\User\Exception\UserNotFoundException;
use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\User\UserRepositoryInterface;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;

class UserRepositoryStub implements UserRepositoryInterface
{
    /**
     * @var User[]
     */
    private $users;

    /**
     * @param UserUsername $username
     *
     * @return User
     * @throws UserNotFoundException
     */
    public function findUser(UserUsername $username): User
    {
        foreach($this->users as $user) {
            if ($user->getUsername() === $username) {
                return $user;
            }
        }
        throw new UserNotFoundException();
    }

    public function addUser(User $user):void
    {
        $this->users = $user;
    }
}
