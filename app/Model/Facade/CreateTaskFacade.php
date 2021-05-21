<?php

namespace App\Model\Facade;

use App\Model\Database\Entity\Task;
use App\Model\Database\EntityManager;

class CreateTaskFacade
{

    /** @var EntityManager */
    private $entityManager;

    public function __construct(
        EntityManager $entityManager
    ) {
        $this->entityManager = $entityManager;
    }

    public function addTask($taskName, $deadline, $user): Task
    {
        // Create Task
        $task = new Task(
            $taskName,
            $deadline,
            $user
        );

        // Save task
        $this->entityManager->persist($task);
        $this->entityManager->flush();

        return $task;
    }
}
