<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task\ValueObject;


use Cesc\Docler\Domain\Task\Exception\InvalidTaskStatusValueException;

class TaskStatus
{
    public const COMPLETED = 'completed';
    public const TODO = 'todo';
    public const IN_PROGRESS = 'in progress';

    public const TASK_STATUS = [
      self::COMPLETED,
      self::TODO,
      self::IN_PROGRESS
    ];

    /**
     * @var string
     */
    private $value;

    /**
     * TaskStatus constructor.
     *
     * @param string $value
     *
     * @throws InvalidTaskStatusValueException
     */
    public function __construct(string $value)
    {
        $this->assertValid($value);
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value():string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @throws InvalidTaskStatusValueException
     */
    private function assertValid(string $value):void
    {
        if (! in_array($value, self::TASK_STATUS)) {
            throw new InvalidTaskStatusValueException("Status not valid");
        }
    }


}
