<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette\Database\Explorer;

final class HomepagePresenter extends BasePresenter
{
	private $database;

	public function __construct(Explorer $database)
	{
		$this->database = $database;
	}

	public function renderDefault(): void
	{
		
		$tasks = $this->database->table('tasks')->where('done', 0);

		$this->template->tasks = $tasks;
	}
}
