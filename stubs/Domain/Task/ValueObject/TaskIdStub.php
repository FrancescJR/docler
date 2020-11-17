<?php
declare(strict_types=1);

namespace Cesc\Docler\Stubs\Domain\Task\ValueObject;


use Cesc\Docler\Domain\Task\Exception\InvalidTaskIdValueException;
use Cesc\Docler\Domain\User\ValueObject\TaskId;
use Ramsey\Uuid\Uuid;

class TaskIdStub
{
    public const DEFAULT_ID = '20b091c6-46ca-4f0c-83d1-c3ffa12a487a';

    /**
     * @return TaskId
     */
    public static function default(): TaskId
    {
        return new TaskId(self::DEFAULT_ID);
    }

    /**
     * @return TaskId
     * @throws InvalidTaskIdValueException
     */
    public static function random(): TaskId
    {
        return new TaskId(Uuid::uuid1()->toString());
    }

}
