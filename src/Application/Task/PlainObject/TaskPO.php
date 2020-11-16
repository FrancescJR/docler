<?php
declare(strict_types=1);

namespace Cesc\Docler\Application\Task\PlainObject;

use Cesc\Docler\Domain\Task\Task;

class TaskPO
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
        $this->id = $task->getId()->value();
        $this->description = $task->getDescription()->value();
        $this->status = $task->getStatus()->value();
    }



}
