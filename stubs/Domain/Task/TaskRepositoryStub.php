<?php
declare(strict_types=1);

namespace Cesc\Docler\Stubs\Domain\Task;


use Cesc\Docler\Domain\Task\Exception\TaskNotFoundException;
use Cesc\Docler\Domain\Task\Task;
use Cesc\Docler\Domain\Task\TaskRepositoryInterface;
use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\Task\ValueObject\TaskId;

class TaskRepositoryStub implements TaskRepositoryInterface
{
    /**
     * @var Task[]
     */
    private $tasks;


    /**
     * @param TaskId $taskId
     *
     * @return Task
     * @throws TaskNotFoundException
     */
    public function find(TaskId $taskId): Task
    {
        foreach($this->tasks as $task) {
            if ($task->getId() === $taskId) {
                return $task;
            }
        }
        throw new TaskNotFoundException();
    }

    /**
     * @param User $user
     *
     * @return array
     */
    public function getByUser(User $user): array
    {
        $tasks = [];
        foreach($this->tasks as $task) {
            if ($task->getUser() === $user) {
                $tasks[] = $task;
            }
        }
        return $tasks;

    }

    /**
     * @param Task $task
     */
    public function save(Task $task): void
    {
        $this->tasks[] = $task;
    }
}
