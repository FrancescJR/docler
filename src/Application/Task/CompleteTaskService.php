<?php
declare(strict_types=1);

namespace Cesc\Docler\Application\Task;

use Cesc\Docler\Domain\Task\Exception\InvalidTaskIdValueException;
use Cesc\Docler\Domain\Task\Exception\TaskNotFoundException;
use Cesc\Docler\Domain\Task\TaskRepositoryInterface;
use Cesc\Docler\Domain\Task\ValueObject\TaskId;
use Cesc\Docler\Domain\Task\ValueObject\TaskStatus;

class CompleteTaskService
{
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param string $taskId
     *
     * @throws InvalidTaskIdValueException
     * @throws TaskNotFoundException
     */
    public function execute(string $taskId): void
    {
        $task = $this->taskRepository->findById(new TaskId($taskId));

        $task->setStatus(new TaskStatus(TaskStatus::COMPLETED));

        $this->taskRepository->save($task);
    }

}
