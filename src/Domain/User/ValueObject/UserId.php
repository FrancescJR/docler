<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\User\ValueObject;


use Cesc\Docler\Domain\User\Exception\InvalidUserIdValueException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserId
 * @package Cesc\Docler\Domain\User\ValueObject
 * @ORM\Embeddable()
 */
class UserId
{

    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="uuid")
     * @var UuidInterface
     */
    private $value;

    /**
     * TaskId constructor.
     *
     * @param string $taskId
     *
     * @throws InvalidUserIdValueException
     */
    public function __construct(string $taskId)
    {
        $this->assertIsUuid($taskId);
        $this->value = Uuid::fromString($taskId);
    }

    /**
     * @param string $value
     *
     * @throws InvalidUserIdValueException
     */
    private function assertIsUuid(string $value): void
    {
        if ( ! Uuid::isValid($value)) {
            throw new InvalidUserIdValueException('User ID is not a UUID.');
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
