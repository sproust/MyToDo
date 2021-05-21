<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Forms\AddTaskFormFactory;
use App\Model\Database\EntityManager;
use App\Model\Facade\CreateTaskFacade;
use DateTime;
use Exception;

final class HomepagePresenter extends TaskPresenter
{
	/**
	 * @var AddTaskFormFactory
	 * @inject
	 */
	public $addTaskFormFactory;

	/**
	 * @var EntityManager
	 * @inject
	 */
	public $entityManager;

	/**
	 * @var CreateTaskFacade
	 * @inject
	 */
	public $createTaskFacade;

	public function renderDefault(): void
	{

		$taskRepository = $this->entityManager->getTaskRepository();
		$tasks = $taskRepository->getUsersUndoneTasks($this->getUser()->getId());

		$this->template->tasks = $tasks;
	}

	public function createComponentAddTaskForm()
	{
		$form = $this->addTaskFormFactory->create();

		$form->onSuccess[] = [$this, "addTaskSuccess"];

		return $form;
	}

	public function addTaskSuccess($form, $values)
	{
		if (isset($form)) {

			$userRepository = $this->entityManager->getUserRepository();
			$user = $userRepository->getUserById($this->getUser()->getId());

			$deadline = new DateTime($values->deadline);

			try {
				$this->createTaskFacade->addTask(
					$values->task,
					$deadline,
					$user
				);
			} catch (Exception $e) {
				$form->addError("Couldn't add task.");
				return;
			}
		}
	}

	public function actionDone($taskId) {

		$taskRepository = $this->entityManager->getTaskRepository();
		$task = $taskRepository->getTask($taskId);

		$task->setDone();
		$task->setEditedAt();

		$this->entityManager->persist($task);
		$this->entityManager->flush();

		$this->redirect("Homepage:default");
	}
}
