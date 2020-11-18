<?php
declare(strict_types=1);

namespace Cesc\Docler\Application\User;

use Cesc\Docler\Application\Task\PlainObject\TaskPO;
use Cesc\Docler\Stubs\Domain\Task\TaskRepositoryStub;
use Cesc\Docler\Stubs\Domain\Task\TaskStub;
use Cesc\Docler\Stubs\Domain\User\UserRepositoryStub;
use Cesc\Docler\Stubs\Domain\User\UserStub;
use Cesc\Docler\Stubs\Domain\User\ValueObject\UserUsernameStub;
use PHPUnit\Framework\TestCase;

class GetUserTasksServiceTest extends TestCase
{
    private $userRepository;

    private $taskRepository;

    public function setUp():void
    {
        $user = UserStub::default();
        $task = TaskStub::default();
        $task->setUser($user);
        $user->addTask($task);

        $this->userRepository = new UserRepositoryStub();
        $this->userRepository->addUser($user);

        $this->taskRepository = new TaskRepositoryStub();
        $this->taskRepository->save($task);
    }

    public function testSuccess():void
    {
        $service = new GetUserTasksService(
            $this->userRepository
        );

        $result = $service->execute(UserUsernameStub::DEFAULT_USERNAME);

        self::assertCount(1, $result);
        self::assertEquals(TaskPO::class, get_class($result[0]));
    }

}
