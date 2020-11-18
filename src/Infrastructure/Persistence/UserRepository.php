<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Persistence;

use Cesc\Docler\Domain\User\Exception\UserNotFoundException;
use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\User\UserRepositoryInterface;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;

// By not having a database this is too similar to the stubs.
class UserRepository implements UserRepositoryInterface
{
    /**
     * @var string[]
     */
    private $users = [
        'cesc', 'julia', 'adams', 'sailor3', 'mountain', 'bandit3'
    ];

    /**
     * @param UserUsername $username
     *
     * @return User
     * @throws UserNotFoundException
     */
    public function findUser(UserUsername $username): User
    {
        foreach($this->users as $userData) {
            if ($userData == $username->value()) {
                return new User(new UserUsername($userData));
            }
        }
        throw new UserNotFoundException("User with Username {$username->value()} not found.");
    }
}
