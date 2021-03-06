<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Persistence;


use Cesc\Docler\Domain\Task\Exception\TaskNotFoundException;
use Cesc\Docler\Domain\Task\Task;
use Cesc\Docler\Domain\Task\TaskRepositoryInterface;
use Cesc\Docler\Domain\Task\ValueObject\TaskDescription;
use Cesc\Docler\Domain\Task\ValueObject\TaskId;
use Cesc\Docler\Domain\Task\ValueObject\TaskStatus;
use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;

// By not having a database this is too similar to the stubs.
class TaskRepository implements TaskRepositoryInterface
{
    private $tasks;

    private const TASK_ID_1 = '49f52fc2-2986-11eb-87f0-0242ac110002';
    private const TASK_ID_2 = '49f55e34-2986-11eb-b0b8-0242ac110002';
    private const TASK_ID_3 = '49f5650a-2986-11eb-9e57-0242ac110002';


    public function __construct()
    {
        $user  = new User(new UserUsername('cesc'));
        $task1 = new Task(
            new TaskId(self::TASK_ID_1),
            new TaskDescription("Task 1"),
            new TaskStatus(TaskStatus::TODO)
        );
        $task1->setUser($user);
        $task2 = new Task(
            new TaskId(self::TASK_ID_2),
            new TaskDescription("Task 2"),
            new TaskStatus(TaskStatus::TODO)
        );
        $task2->setUser($user);
        $task3 = new Task(
            new TaskId(self::TASK_ID_3),
            new TaskDescription("Task 3"),
            new TaskStatus(TaskStatus::TODO)
        );
        $task3->setUser($user);
        $this->tasks = [
            $task1->getId()->value() => $task1,
            $task2->getId()->value() => $task2,
            $task3->getId()->value() => $task3
        ];
    }

    public function find(TaskId $taskId): Task
    {
        foreach($this->tasks as $id => $task) {
            if ($id === $taskId->value()) {
                return $task;
            }
        }
        throw new TaskNotFoundException("Task with id {$taskId->value()} not found.");
    }

    public function getByUser(User $user): array
    {
        $tasks = [];
        foreach($this->tasks as $task) {
            if ($task->getUser()->getUsername()->value() === $user->getUsername()->value()) {
                $tasks[] = $task;
            }
        }
        return $tasks;
    }

    public function save(Task $task): void
    {
        $this->tasks[$task->getId()->value()] = $task;
    }
}
