<?php
declare(strict_types=1);

namespace Cesc\Docler\Application\Task\PlainObject;

use Cesc\Docler\Domain\Task\ValueObject\TaskStatus;
use Cesc\Docler\Stubs\Domain\Task\TaskStub;
use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskDescriptionStub;
use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskIdStub;
use PHPUnit\Framework\TestCase;

class TaskPOTest extends TestCase
{
    public function testToArray(): void
    {
        $taskPO = new TaskPO(TaskStub::default());

        $expectedResult = [
            'id' => TaskIdStub::DEFAULT_ID,
            'description' => TaskDescriptionStub::DEFAULT_DESCRIPTION,
            'status' => TaskStatus::TODO
        ];

        self::assertEquals($expectedResult, $taskPO->toArray());
    }

    // testing the serialize function would like testing a third party library of the main PHP, I don't see
    // the point.

}
