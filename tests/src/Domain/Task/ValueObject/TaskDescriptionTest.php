<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task\ValueObject;


use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskDescriptionStub;
use PHPUnit\Framework\TestCase;

class TaskDescriptionsTest extends TestCase
{
    public function testSuccess(): void
    {
        $taskDescription = new TaskDescription(TaskDescriptionStub::DEFAULT_DESCRIPTION);

        self::assertEquals(TaskDescriptionStub::DEFAULT_DESCRIPTION, $taskDescription->value());
    }

}
