<?php

namespace App\Presenters;

use App\Model\Database\EntityManager;

class TaskPresenter extends AuthenticatedPresenter
{

    /**
     * @var EntityManager
     * @inject
     */
    public $entityManager;

    public function actionEdit($taskId, $taskText, $redirection): void
    {

        $taskRepository = $this->entityManager->getTaskRepository();
        $task = $taskRepository->getTask($taskId);

        $task->setTask($taskText);
        $task->setEditedAt();

        $this->entityManager->persist($task);
		$this->entityManager->flush();

        $this->redirect("$redirection:default");
    }
}
