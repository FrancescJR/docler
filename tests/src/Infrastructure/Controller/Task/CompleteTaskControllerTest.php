<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Controller\Task;

use Cesc\Docler\Application\Task\CompleteTaskService;
use Cesc\Docler\Domain\Task\Exception\TaskNotFoundException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;

class CompleteTaskControllerTest extends TestCase
{
    public function testSuccess():void
    {
        $service = self::createMock(CompleteTaskService::class);

        $controller = new CompleteTaskController(
            $service
        );

        $response = $controller->completeTask("task");

        self::assertEquals(JsonResponse::HTTP_OK, $response->getStatusCode());
    }

    public function testError():void
    {
        $service = self::createMock(CompleteTaskService::class);
        $service->method('execute')->willThrowException(new TaskNotFoundException("task not found"));
        $controller = new CompleteTaskController(
            $service
        );

        $response = $controller->completeTask("task");

        self::assertEquals(JsonResponse::HTTP_NOT_FOUND, $response->getStatusCode());
    }

}
