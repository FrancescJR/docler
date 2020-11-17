<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task\ValueObject;

use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskIdStub;
use PHPUnit\Framework\TestCase;

class TaskIdTest extends TestCase
{
    public function testSuccess(): void
    {
        $taskId = new TaskId(TaskIdStub::DEFAULT_ID);

        self::assertEquals(TaskIdStub::DEFAULT_ID, $taskId->value());
    }

}
