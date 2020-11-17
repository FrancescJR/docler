<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task\ValueObject;


use Cesc\Docler\Domain\Task\Exception\InvalidTaskIdValueException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class TaskId
{

    /**
     * @var UuidInterface
     */
    private $value;

    /**
     * TaskId constructor.
     *
     * @param string $taskId
     *
     * @throws InvalidTaskIdValueException
     */
    public function __construct(string $taskId)
    {
        $this->assertIsUuid($taskId);
        $this->value = Uuid::fromString($taskId);
    }

    /**
     * @param string $value
     *
     * @throws InvalidTaskIdValueException
     */
    private function assertIsUuid(string $value): void
    {
        if ( ! Uuid::isValid($value)) {
            throw new InvalidTaskIdValueException('Task ID is not a UUID.');
        }
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value->toString();
    }

}
