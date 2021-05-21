<?php

declare(strict_types=1);

namespace App\Presenters;

//use Nette\Database\Explorer;
use App\Forms\AddTaskFormFactory;
use App\Model\Database\EntityManager;
use App\Model\Facade\CreateTaskFacade;
use DateTime;
use Exception;

final class HomepagePresenter extends AuthenticatedPresenter
{
	//private $database;

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

	public function __construct(
		//Explorer $database
	)
	{
		//$this->database = $database;
	}


	public function renderDefault(): void
	{

		// $tasks = $this->database->table('tasks')->where('done', 0);
		// $this->template->tasks = $tasks;

		$taskRepository = $this->entityManager->getTaskRepository();
		$tasks = $taskRepository->getAllUndoneTasks();

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
}
