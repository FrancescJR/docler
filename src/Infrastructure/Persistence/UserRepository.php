<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Persistence;

use Cesc\Docler\Domain\User\Exception\UserNotFoundException;
use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\User\UserRepositoryInterface;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;
use Cesc\Docler\Stubs\Domain\User\UserStub;

class UserRepository implements UserRepositoryInterface
{

    public function findUser(UserUsername $username): User
    {
        return UserStub::default();
        // TODO: Implement findUser() method.
        throw new UserNotFoundException("User with Username {$username->value()} not found.");
    }
}
