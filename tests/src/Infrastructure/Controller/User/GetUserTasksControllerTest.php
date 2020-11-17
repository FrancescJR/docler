<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Controller\User;

use Cesc\Docler\Application\Task\PlainObject\TaskPO;
use Cesc\Docler\Application\User\GetUserTasksService;
use Cesc\Docler\Domain\User\Exception\UserNotFoundException;
use Cesc\Docler\Stubs\Domain\Task\TaskStub;
use Cesc\Docler\Stubs\Domain\Task\ValueObject\TaskIdStub;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetUserTasksControllerTest extends TestCase
{
    public function testSuccess():void
    {
        $service = self::createMock(GetUserTasksService::class);
        $service->method('execute')->willReturn([
            new TaskPO(TaskStub::default())
        ]);

        $controller = new GetUserTasksController(
            $service
        );

        $response = $controller->getTasks("");

        self::assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
        self::assertStringContainsString(TaskIdStub::DEFAULT_ID, $response->getContent());
    }

    public function testError():void
    {
        $service = self::createMock(GetUserTasksService::class);
        $service->method('execute')->willThrowException(new UserNotFoundException("user not found"));
        $controller = new GetUserTasksController(
            $service
        );

        $response = $controller->getTasks("");

        self::assertEquals(JsonResponse::HTTP_NOT_FOUND, $response->getStatusCode());
    }

}
