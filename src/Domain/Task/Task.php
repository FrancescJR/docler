<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task;

use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\Task\ValueObject\TaskDescription;
use Cesc\Docler\Domain\Task\ValueObject\TaskId;
use Cesc\Docler\Domain\Task\ValueObject\TaskStatus;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Task
 * @package Cesc\Docler\Domain\Task
 * @ORM\Entity()
 * @ORM\Table(name="task")
 */
class Task
{
    /**
     * @ORM\Embedded(class="Cesc\Docler\Domain\Task\ValueObject\TaskId", columnPrefix=false)
     * @var TaskId
     */
    private $id;

    /**
     * @ORM\Embedded(class="Cesc\Docler\Domain\Task\ValueObject\TaskDescription", columnPrefix=false)
     * @var TaskDescription
     */
    private $description;

    /**
     * @ORM\Embedded(class="Cesc\Docler\Domain\Task\ValueObject\TaskStatus", columnPrefix=false)
     * @var TaskStatus
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Cesc\Docler\Domain\User\User", inversedBy="tasks", fetch="EAGER")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var User|null;
     */
    private $user;

    /**
     * Task constructor.
     *
     * @param TaskId $id
     * @param TaskDescription $description
     * @param TaskStatus $status
     */
    public function __construct(
        TaskId $id,
        TaskDescription $description,
        TaskStatus $status
    ) {
        $this->id          = $id;
        $this->description = $description;
        $this->status      = $status;
    }

    /**
     * @return TaskId
     */
    public function getId(): TaskId
    {
        return $this->id;
    }

    /**
     * @return TaskDescription
     */
    public function getDescription(): TaskDescription
    {
        return $this->description;
    }

    /**
     * @return TaskStatus
     */
    public function getStatus(): TaskStatus
    {
        return $this->status;
    }

    /**
     * @param TaskStatus $status
     */
    public function setStatus(TaskStatus $status): void
    {
        $this->status = $status;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
