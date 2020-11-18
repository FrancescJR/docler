<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TaskDescription
 * @package Cesc\Docler\Domain\Task\ValueObject
 * @ORM\Embeddable()
 */
class TaskDescription
{

    /**
     * @ORM\Column(name="description",type="text")
     * @var string
     */
    private $value;

    /**
     * TaskDescription constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }

}
