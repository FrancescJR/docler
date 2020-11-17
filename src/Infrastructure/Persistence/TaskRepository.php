<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Persistence;


use Cesc\Docler\Domain\Task\Exception\TaskNotFoundException;
use Cesc\Docler\Domain\Task\Task;
use Cesc\Docler\Domain\Task\TaskRepositoryInterface;
use Cesc\Docler\Domain\Task\ValueObject\TaskId;
use Cesc\Docler\Domain\User\User;

class TaskRepository implements TaskRepositoryInterface
{

    public function find(TaskId $taskId): Task
    {
        // TODO: Implement find() method.
        throw new TaskNotFoundException("Task with id {$taskId->value()} not found.");
    }

    public function getByUser(User $user): array
    {
        // TODO: Implement getByUser() method.
        return [];
    }

    public function save(Task $task): void
    {
        // TODO: Implement save() method.
    }
}
