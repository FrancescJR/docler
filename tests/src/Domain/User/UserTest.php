<?php
declare(strict_types=1);

namespace Cesc\Docler\Domain\User;


use Cesc\Docler\Stubs\Domain\Task\TaskStub;
use Cesc\Docler\Stubs\Domain\User\ValueObject\UserIdStub;
use Cesc\Docler\Stubs\Domain\User\ValueObject\UserUsernameStub;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function testCreateAndGetters():void
    {
        $user = new User(
            UserIdStub::default(),
            UserUsernameStub::default(),
        );

        self::assertEquals(UserIdStub::default(), $user->getId());
        self::assertEquals(UserUsernameStub::default(), $user->getUsername());
    }

    public function testAddTask():void
    {
        $user = new User(
            UserIdStub::default(),
            UserUsernameStub::default(),
        );

        self::assertCount(0, $user->getTasks());

        $user->addTask(TaskStub::default());

        self::assertCount(1, $user->getTasks());
    }
}
