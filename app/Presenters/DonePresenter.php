<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Database\EntityManager;

final class DonePresenter extends TaskPresenter
{

	/**
	 * @var EntityManager
	 * @inject
	 */
	public $entityManager;

	public function renderDefault(): void
	{
		$taskRepository = $this->entityManager->getTaskRepository();

		if ($this->user->isInRole("admin")) {
			$tasks = $taskRepository->getAllDoneTasks();

			$this->template->users = $this->getUsers();
		} else {
			$tasks = $taskRepository->getUsersDoneTasks($this->getUser()->getId());
		}

		$this->template->tasks = $tasks;
	}

	public function handleUndone($taskId)
	{
		if ($this->isAjax()) {
			$taskRepository = $this->entityManager->getTaskRepository();
			$task = $taskRepository->getTask($taskId);

			$task->setUndone();
			$task->setEditedAt();

			$this->entityManager->persist($task);
			$this->entityManager->flush();

			$this->redrawControl("tasks");
		}
	}
}
