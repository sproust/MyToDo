<?php

declare(strict_types=1);

namespace App\Presenters;

class AuthenticatedPresenter extends BasePresenter
{
	protected function startup()
    {
        parent::startup();
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }

    public function getUsers()
    {
        $userRepository = $this->entityManager->getUserRepository();
        $users = $userRepository->getAllUsers();

        return $users;
    }
}