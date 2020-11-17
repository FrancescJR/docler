<?php
declare(strict_types=1);

namespace Cesc\Docler\Application\Task\PlainObject;

use Cesc\Docler\Domain\Task\Task;
use JsonSerializable;

class TaskPO implements JsonSerializable
{
    public $id;
    public $description;
    public $status;

    /**
     * TaskPO constructor.
     *
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->id          = $task->getId()->value();
        $this->description = $task->getDescription()->value();
        $this->status      = $task->getStatus()->value();
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'          => $this->id,
            'description' => $this->description,
            'status'      => $this->status
        ];
    }


}
