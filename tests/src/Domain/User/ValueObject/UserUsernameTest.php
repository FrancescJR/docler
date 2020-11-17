<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\User\ValueObject;

use Cesc\Docler\Stubs\Domain\User\ValueObject\UserUsernameStub;
use PHPUnit\Framework\TestCase;

class UserUsernameTest extends TestCase
{

    public function testSuccess(): void
    {
        $username = new UserUsername(UserUsernameStub::DEFAULT_USERNAME);

        self::assertEquals(UserUsernameStub::DEFAULT_USERNAME, $username->value());
    }

}
