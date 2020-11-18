<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\User\ValueObject;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class UserUsername
 * @package Cesc\Docler\Domain\User\ValueObject
 * @ORM\Embeddable()
 */
class UserUsername
{

    /**
     * @ORM\Column(name="username", type="text", length=255)
     * @var string
     */
    private $value;

    public function __construct(string $username)
    {
        $this->value = $username;
    }

    public function value(): string
    {
        return $this->value;
    }

}
