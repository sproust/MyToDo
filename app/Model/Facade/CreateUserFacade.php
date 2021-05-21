<?php

namespace App\Model\Facade;

use App\Model\Database\Entity\User;
use App\Model\Database\EntityManager;
use Nette\Security\Passwords;

class CreateUserFacade
{

    /** @var EntityManager */
    private $entityManager;

    /** @var Passwords */
    private $passwords;

    public function __construct(
        EntityManager $entityManager,
        Passwords $passwords
    ) {
        $this->entityManager = $entityManager;
        $this->passwords = $passwords;
    }

    /**
     * @param mixed[] $data
     */
    public function createUser(array $data): User
    {
        // Create User
        $user = new User(
            $data['username'],
            $this->passwords->hash($data['password']),
            $data['email']
        );

        // Save user
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}
