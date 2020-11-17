<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Controller\Task;

use Cesc\Docler\Application\Task\CompleteTaskService;
use Cesc\Docler\Application\User\GetUserTasksService;
use Cesc\Docler\Domain\Task\Exception\TaskNotFoundException;
use Cesc\Docler\Domain\User\Exception\UserNotFoundException;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetUserTasksController
{

    private $getUserTasksService;

    public function __construct(GetUserTasksService $getUserTasksService)
    {
        $this->getUserTasksService = $getUserTasksService;
    }

    /**
     * @Route("/v1/user/{username}/tasks", methods={"GET"})
     *
     * @param string $task
     *
     * @return JsonResponse
     */
    public function getUserTasksService(string $task): JsonResponse
    {
        try {
            $tasksPO = $this->getUserTasksService->execute($task);
        } catch (UserNotFoundException $e) {
            return new JsonResponse(["error" => $e->getMessage()], JsonResponse::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return new JsonResponse(["error" => $e->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
        }

        return new JsonResponse($tasksPO, JsonResponse::HTTP_OK);

    }

}
