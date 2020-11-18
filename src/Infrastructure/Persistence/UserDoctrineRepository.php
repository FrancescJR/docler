<?php
declare(strict_types=1);

namespace Cesc\Docler\Infrastructure\Persistence;


use Cesc\Docler\Domain\User\Exception\UserNotFoundException;
use Cesc\Docler\Domain\User\User;
use Cesc\Docler\Domain\User\UserRepositoryInterface;
use Cesc\Docler\Domain\User\ValueObject\UserUsername;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;

class UserDoctrineRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @param UserUsername $username
     *
     * @return User
     * @throws UserNotFoundException
     */
    public function findUser(UserUsername $username): User
    {
        /** @var  $user  User */
        $users = $this->findBy(['username.value' => $username->value()]);
        if ( ! count($users)) {
            throw new UserNotFoundException("User with username {$username->value()} not found.");
        }

        return $users[0];
    }
}
