<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\User\ValueObject;

class UserUsername
{

    private $value;

    public function __construct(string $username)
    {
        $this->value = $username;
    }

    public function value():string
    {
        return $this->value;
    }

}
