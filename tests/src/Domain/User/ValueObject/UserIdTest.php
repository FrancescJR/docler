<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\User\ValueObject;


use Cesc\Docler\Stubs\Domain\User\ValueObject\UserIdStub;
use PHPUnit\Framework\TestCase;

class UserIdTest extends TestCase
{
    public function testSuccess(): void
    {
        $userId = new UserId(UserIdStub::DEFAULT_ID);

        self::assertEquals(UserIdStub::DEFAULT_ID, $userId->value());
    }

}
