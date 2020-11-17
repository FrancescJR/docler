<?php
declare(strict_types=1);

namespace Cesc\Docler\Stubs\Domain\Task;

use Cesc\Docler\Domain\Task\Task;
use Cesc\Docler\Domain\Task\ValueObject\TaskDescription;
use Cesc\Docler\Domain\Task\ValueObject\TaskId;
use Cesc\Docler\Domain\Task\ValueObject\TaskStatus;
use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskDescriptionStub;
use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskIdStub;
use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskStatusStub;

class TaskStub
{
    /**
     * @param TaskId $id
     * @param TaskDescription $description
     * @param TaskStatus $status
     *
     * @return Task
     */
    public static function create(TaskId $id, TaskDescription $description, TaskStatus $status): Task
    {
        return new Task($id, $description, $status);
    }

    /**
     * @return Task
     */
    public static function default():Task
    {
        return static::create(
            TaskIdStub::default(),
            TaskDescriptionStub::default(),
            TaskStatusStub::default()
        );
    }


}
