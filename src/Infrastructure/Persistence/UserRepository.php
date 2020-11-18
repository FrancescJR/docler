<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Persistence;

use Cesc\Docler\Domain\User\Exception\InvalidUserIdValueException;
use Cesc\Docler\Domain\User\Exception\UserNotFoundException;
use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\User\UserRepositoryInterface;
use Cesc\Docler\Domain\User\ValueObject\UserId;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;

// By not having a database this is too similar to the stubs.
class UserRepository implements UserRepositoryInterface
{
    /**
     * @var string[]
     */
    private $users = [
        ['30b091c6-46ca-4f0c-83d1-c3ffa12a487a', 'cesc']
    ];

    /**
     * @param UserUsername $username
     *
     * @return User
     * @throws UserNotFoundException
     * @throws InvalidUserIdValueException
     */
    public function findUser(UserUsername $username): User
    {
        foreach ($this->users as $userData) {
            if ($userData[1] == $username->value()) {
                return new User(new UserId($userData[0]), new UserUsername($userData[1]));
            }
        }
        throw new UserNotFoundException("User with Username {$username->value()} not found.");
    }
}
