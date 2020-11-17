<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\User;

use Cesc\Docler\Domain\Task\Task;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;

class User
{
    /**
     * @var UserUsername
     */
    private $username;

    /**
     * @var Task[]
     */
    private $tasks;

    /**
     * User constructor.
     *
     * @param UserUsername $username
     */
    public function __construct(
        UserUsername $username
    ) {
        $this->username = $username;
    }

    /**
     * @return UserUsername
     */
    public function getUsername(): UserUsername
    {
        return $this->username;
    }

    /**
     * @return Task[]
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @param Task $task
     */
    public function addTask(Task $task): void
    {
        $this->tasks[] = $task;
    }


}
