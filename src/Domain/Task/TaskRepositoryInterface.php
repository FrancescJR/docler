<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task;


use Cesc\Docler\Domain\Exception\PersistenceException;
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
    public function findById(TaskId $taskId): Task;

    /**
     * @param Task $task
     * @throws PersistenceException
     */
    public function save(Task $task): void;

}
