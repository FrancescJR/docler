<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task;

use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskDescriptionStub;
use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskIdStub;
use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskStatusStub;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{

    public function testCreateAndGetters():void
    {
        $task = new Task(
            TaskIdStub::default(),
            TaskDescriptionStub::default(),
            TaskStatusStub::default()
        );

        self::assertEquals(TaskIdStub::default(), $task->getId());
        self::assertEquals(TaskDescriptionStub::default(), $task->getDescription());
        self::assertEquals(TaskStatusStub::default(), $task->getStatus());
    }

}
