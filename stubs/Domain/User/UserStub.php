<?php

namespace Cesc\Docler\Stubs\Domain\User;

use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;
use Cesc\Docler\Stubs\Domain\User\ValueObject\UserUsernameStub;

class UserStub
{

    /**
     * @param UserUsername $username
     *
     * @return User
     */
    public static function create(UserUsername $username): User
    {
        return new User($username);
    }

    /**
     * @return User
     */
    public static function default():User
    {
        return static::create(
            UserUsernameStub::default(),
        );
    }

}
