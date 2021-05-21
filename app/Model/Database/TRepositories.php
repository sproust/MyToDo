<?php

namespace App\Model\Database;


use App\Model\Database\Entity\User;
use App\Model\Database\Entity\Task;
use App\Model\Database\Repository\UserRepository;
use App\Model\Database\Repository\TaskRepository;

/**
 * Shortcuts for type hinting
 */
trait TRepositories
{

	public function getUserRepository(): UserRepository
	{
		return $this->getRepository(User::class);
	}

	public function getTaskRepository(): TaskRepository
	{
		return $this->getRepository(Task::class);
	}

}