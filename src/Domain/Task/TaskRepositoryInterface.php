<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task;


use Cesc\Docler\Domain\Task\Exception\TaskNotFoundException;
use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\Task\ValueObject\TaskId;

interface TaskRepositoryInterface
{
    /**
     * @param TaskId $taskId
     *
     * @return Task
     * @throws TaskNotFoundException
     */
    public function find(TaskId $taskId): Task;

    /**
     * @param User $user
     *
     * @return Task[]
     */
    public function getByUser(User $user): array;

    /**
     * @param Task $task
     *
     */
    public function save(Task $task): void;

}
