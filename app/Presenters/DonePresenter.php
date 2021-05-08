<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette\Database\Explorer;

final class DonePresenter extends BasePresenter
{
	private $database;

	public function __construct(Explorer $database)
	{
		$this->database = $database;
	}

	public function renderDefault(): void
	{
		$tasks = $this->database->table('tasks')->where('done', 1);

		$this->template->tasks = $tasks;

	}
}