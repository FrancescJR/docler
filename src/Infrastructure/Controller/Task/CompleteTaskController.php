<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Controller\Task;

use Cesc\Docler\Application\Task\CompleteTaskService;
use Cesc\Docler\Domain\Task\Exception\TaskNotFoundException;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CompleteTaskController
{

    private $completeTaskService;

    public function __construct(CompleteTaskService $completeTaskService)
    {
        $this->completeTaskService = $completeTaskService;
    }

    /**
     * @Route("/v1/task/{task}/complete", methods={"PATCH"})
     *
     * @param string $task
     *
     * @return JsonResponse
     */
    public function completeTask(string $task): JsonResponse
    {
        try {
            $this->completeTaskService->execute($task);
        } catch (TaskNotFoundException $e) {
            return new JsonResponse(["error" => $e->getMessage()], JsonResponse::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return new JsonResponse(["error" => $e->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
        }

        return new JsonResponse([], JsonResponse::HTTP_OK);

    }

}
