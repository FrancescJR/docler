<?php
declare(strict_types=1);

namespace Cesc\Docler\Application\User;

use Cesc\Docler\Application\Task\PlainObject\TaskPO;
use Cesc\Docler\Domain\Task\TaskRepositoryInterface;
use Cesc\Docler\Domain\User\Exception\UserNotFoundException;
use Cesc\Docler\Domain\User\UserRepositoryInterface;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;

class GetUserTasksService
{
    private $userRepository;
    private $taskRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        TaskRepositoryInterface $taskRepository
    ) {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $username
     *
     * @return array
     * @throws UserNotFoundException
     */
    public function execute(string $username): array
    {
        $user = $this->userRepository->findUser(new UserUsername($username));

        // I know this could be done in a single query by just making the repo accept the username
        // normally this way is more reusable.
        $tasks = $this->taskRepository->findByUser($user);

        $tasksPO = [];

        foreach ($tasks as $task) {
            $tasksPO[] = new TaskPO($task);
        }

        return $tasksPO;
    }

}
