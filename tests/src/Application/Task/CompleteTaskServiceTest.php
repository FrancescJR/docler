<?php
declare(strict_types=1);

namespace Cesc\Docler\Application\Task;

use Cesc\Docler\Domain\Task\ValueObject\TaskStatus;
use Cesc\Docler\Stubs\Domain\Task\TaskRepositoryStub;
use Cesc\Docler\Stubs\Domain\Task\TaskStub;
use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskIdStub;
use PHPUnit\Framework\TestCase;

class CompleteTaskServiceTest extends TestCase
{
    private $taskRepository;

    public function setUp():void
    {
        $this->taskRepository = new TaskRepositoryStub();
        $this->taskRepository->save(TaskStub::default());
    }

    public function testSuccess():void
    {
        $service = new CompleteTaskService(
            $this->taskRepository
        );

        $service->execute(TaskIdStub::DEFAULT_ID);

        $task = $this->taskRepository->find(TaskIdStub::default());

        self::assertEquals(TaskStatus::COMPLETED, $task->getStatus()->value());
    }


}
