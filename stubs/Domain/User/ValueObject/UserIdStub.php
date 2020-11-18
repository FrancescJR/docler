<?php
declare(strict_types=1);

namespace Cesc\Docler\Stubs\Domain\User\ValueObject;


use Cesc\Docler\Domain\User\Exception\InvalidUserIdValueException;
use Cesc\Docler\Domain\User\ValueObject\UserId;
use Ramsey\Uuid\Uuid;

class UserIdStub
{

    public const DEFAULT_ID = '20b091c6-46ca-4f0c-83d1-c3ffa12a487b';

    /**
     * @return UserId
     */
    public static function default(): UserId
    {
        return new UserId(self::DEFAULT_ID);
    }

    /**
     * @return UserId
     * @throws InvalidUserIdValueException
     */
    public static function random(): UserId
    {
        return new UserId(Uuid::uuid1()->toString());
    }

}
