<?php
declare(strict_types=1);

namespace Cesc\Docler\Stubs\Domain\Task\ValueObject;


use Cesc\Docler\Domain\Task\Exception\InvalidTaskStatusValueException;
use Cesc\Docler\Domain\User\ValueObject\TaskStatus;

class TaskStatusStub
{
    /**
     * @return TaskStatus
     */
    public static function default(): TaskStatus
    {
        return new TaskStatus(TaskStatus::TODO);
    }

    /**
     * @param $status
     *
     * @return TaskStatus
     * @throws InvalidTaskStatusValueException
     */
    public static function withStatus($status): TaskStatus
    {
        return new TaskStatus($status);
    }

}
