<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\Task\ValueObject;

class TaskDescription
{

    /**
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
    public function value():string
    {
        return $this->value;
    }

}
