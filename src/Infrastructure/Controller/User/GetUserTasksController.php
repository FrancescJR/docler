<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Controller\User;

use Cesc\Docler\Application\User\GetUserTasksService;
use Symfony\Component\Routing\Annotation\Route;
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
     * @param string $username
     *
     * @return JsonResponse
     */
    public function getTasks(string $username): JsonResponse
    {
        try {
            $tasksPO = $this->getUserTasksService->execute($username);
        } catch (UserNotFoundException $e) {
            return new JsonResponse(["error" => $e->getMessage()], JsonResponse::HTTP_NOT_FOUND);
        } catch (Exception $e) {
            return new JsonResponse(["error" => $e->getMessage()], JsonResponse::HTTP_BAD_REQUEST);
        }

        return new JsonResponse($tasksPO, JsonResponse::HTTP_OK);

    }

}
