<?php

namespace Cesc\Docler\Stubs\Domain\User;

use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\User\ValueObject\UserId;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;
use Cesc\Docler\Stubs\Domain\User\ValueObject\UserIdStub;
use Cesc\Docler\Stubs\Domain\User\ValueObject\UserUsernameStub;

class UserStub
{

    /**
     * @param UserId $id
     * @param UserUsername $username
     *
     * @return User
     */
    public static function create(UserId $id, UserUsername $username): User
    {
        return new User($id, $username);
    }

    /**
     * @return User
     */
    public static function default():User
    {
        return static::create(
            UserIdStub::default(),
            UserUsernameStub::default(),
        );
    }

}
