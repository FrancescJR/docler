<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\User;

use Cesc\Docler\Domain\Task\Task;
use Cesc\Docler\Domain\User\ValueObject\UserId;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package Cesc\Docler\Domain\User
 * @ORM\Entity()
 * @ORM\Table(name="user", indexes={ @ORM\Index(name="unique_username", columns={"username"})})
 */
class User
{
    /**
     * @ORM\Embedded(class="Cesc\Docler\Domain\User\ValueObject\UserId", columnPrefix=false)
     * @var UserId
     */
    private $id;

    /**
     * @ORM\Embedded(class="Cesc\Docler\Domain\User\ValueObject\UserUsername", columnPrefix=false)
     * @var UserUsername
     */
    private $username;

    /**
     * No cascade operations, Tasks have a life of their own, at least for the moment.
     * @ORM\OneToMany(targetEntity="Cesc\Docler\Domain\Task\Task", mappedBy="user", fetch="EAGER")
     * @var Collection
     */
    private $tasks;

    /**
     * User constructor.
     *
     * @param UserId $userId
     * @param UserUsername $username
     */
    public function __construct(
        UserId $userId,
        UserUsername $username
    ) {
        $this->id = $userId;
        $this->username = $username;
        $this->tasks = [];
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
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
        return $this->tasks->toArray();
    }

    /**
     * @param Task $task
     */
    public function addTask(Task $task): void
    {
        $this->tasks[] = $task;
    }


}
