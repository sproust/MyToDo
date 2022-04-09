<?php

namespace App\Presenters;

use App\Model\Database\EntityManager;
use App\Forms\EditTaskFormFactory;
use DateTime;
use Exception;

class TaskPresenter extends AuthenticatedPresenter
{

    /**
     * @var EntityManager
     * @inject
     */
    public $entityManager;

    public function handleEdit($taskId, $taskText, $deadline) {
		if ($this->isAjax()) {

            $taskRepository = $this->entityManager->getTaskRepository();
            $task = $taskRepository->getTask($taskId);

            $deadline = new DateTime($deadline);

			try {
				$task->setTask($taskText);
                $task->setDeadline($deadline);
                $task->setEditedAt();

                $this->entityManager->persist($task);
                $this->entityManager->flush();

                $this->redrawControl("tasks");
                
			} catch (Exception $e) {
				
			}

        }
	}
}
