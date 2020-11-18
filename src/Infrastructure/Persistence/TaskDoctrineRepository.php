<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Persistence;


use Cesc\Docler\Domain\Exception\PersistenceException;
use Cesc\Docler\Domain\Task\Exception\TaskNotFoundException;
use Cesc\Docler\Domain\Task\Task;
use Cesc\Docler\Domain\Task\TaskRepositoryInterface;
use Cesc\Docler\Domain\Task\ValueObject\TaskId;
use Cesc\Docler\Domain\User\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bridge\Doctrine\ManagerRegistry;

class TaskDoctrineRepository extends ServiceEntityRepository implements TaskRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Task::class);
    }


    public function findById(TaskId $taskId): Task
    {
        /** @var  $task  Task */
        $task = $this->find($taskId->value());
        if ($task === null) {
            throw new TaskNotFoundException("Task with id {$taskId->value()} not found.");
        }

        return $task;
    }

    /**
     * @param Task $task
     *
     * @throws PersistenceException
     */
    public function save(Task $task): void
    {
        try {
            $this->getEntityManager()->persist($task);
            $this->getEntityManager()->flush();
        } catch (OptimisticLockException | ORMException $exception) {
            throw new PersistenceException($exception->getMessage());
        }
    }


}
