<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\User;


use Cesc\Docler\Domain\User\Exception\UserNotFoundException;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;

interface UserRepositoryInterface
{
    /**
     * @param UserUsername $username
     *
     * @return User
     * @throws UserNotFoundException
     */
    public function findUser(UserUsername $username): User;

}
