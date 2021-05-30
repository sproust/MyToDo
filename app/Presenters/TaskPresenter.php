<?php

namespace App\Presenters;

use App\Model\Database\EntityManager;
use App\Forms\EditTaskFormFactory;
use DateTime;
use Exception;
use Nette\Http\Request;

class TaskPresenter extends AuthenticatedPresenter
{

    /**
     * @var EntityManager
     * @inject
     */
    public $entityManager;

    /**
     * @var EditTaskFormFactory
     * @inject
     */
    public $editTaskFormFactory;

    public function createComponentEditTaskForm() {
        $form = $this->editTaskFormFactory->create();

        $form->onSuccess[] = [$this, "editTaskSuccess"];

		return $form;
    }

    public function editTaskSuccess($form, $values)
	{
		if (isset($form)) {

			$taskRepository = $this->entityManager->getTaskRepository();
            $task = $taskRepository->getTask($values->id);

            $deadline = new DateTime($values->deadline);

			try {
				$task->setTask($values->task);
                $task->setDeadline($deadline);
                $task->setEditedAt();

                $this->entityManager->persist($task);
                $this->entityManager->flush();

                $httpRequest = $this->getHttpRequest();
                $url = $httpRequest->getUrl();
                $urlArray = explode("/", $url);
                
                if($urlArray[1] == "done") {
                    $presenter = "Done";
                } else {
                    $presenter = "Homepage";
                }

                $this->redirect($presenter . ":default");
			} catch (Exception $e) {
				$form->addError("Couldn't edit task.");
				return;
			}
		}
	}
}
