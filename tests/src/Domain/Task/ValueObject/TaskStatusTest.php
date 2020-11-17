<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task\ValueObject;


use Cesc\Docler\Domain\Task\Exception\InvalidTaskStatusValueException;
use Cesc\Docler\Domain\User\ValueObject\TaskStatus;
use PHPUnit\Framework\TestCase;

class TaskStatusTest extends TestCase
{
    public function testSuccess(): void
    {
        $taskStatus = new TaskStatus(TaskStatus::COMPLETED);

        self::assertEquals(TaskStatus::COMPLETED, $taskStatus->value());
    }

    public function testInvalidValue(): void
    {
        self::expectException(InvalidTaskStatusValueException::class);
        new TaskStatus("wrong");
    }

}
