<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette\Database\Explorer;

final class TaskPresenter extends BasePresenter
{
	private $database;

	public function __construct(Explorer $database)
	{
		$this->database = $database;
	}

	public function renderShow($taskId): void
	{
		$task = $this->database->table('tasks')->get($taskId);

		$this->template->task = $task;

	}
}