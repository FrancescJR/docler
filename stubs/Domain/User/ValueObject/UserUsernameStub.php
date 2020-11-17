<?php
declare(strict_types=1);

namespace Cesc\Docler\Stubs\Domain\User\ValueObject;

use Cesc\Docler\Domain\User\ValueObject\UserUsername;

class UserUsernameStub
{

    public const DEFAULT_USERNAME = "Cesc";

    /**
     * @return UserUsername
     */
    public static function default(): UserUsername
    {
        return new UserUsername(self::DEFAULT_USERNAME);
    }

    /**
     * @param string $username
     *
     * @return UserUsername
     */
    public static function custom(string $username):UserUsername
    {
        return new UserUsername($username);
    }
}
