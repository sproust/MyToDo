<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Model\Database\EntityManager;

final class UserManagementPresenter extends AuthenticatedPresenter
{

	/**
	 * @var EntityManager
	 * @inject
	 */
	public $entityManager;

	public function renderDefault(): void
	{
		if ($this->user->isInRole("admin")) {
			$this->template->users = $this->getUsers();
		}
	}
}
