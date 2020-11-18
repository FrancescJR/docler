<?php
declare(strict_types=1);

namespace Cesc\Docler\Application\User;

use Cesc\Docler\Application\Task\PlainObject\TaskPO;
use Cesc\Docler\Domain\User\Exception\UserNotFoundException;
use Cesc\Docler\Domain\User\UserRepositoryInterface;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;

class GetUserTasksService
{
    private $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    ) {
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

        $tasksPO = [];

        foreach ($user->getTasks() as $task) {
            $tasksPO[] = new TaskPO($task);
        }

        return $tasksPO;
    }

}
