<?php

declare(strict_types=1);

namespace App\Model;

use Nette;
use Nette\Security\Passwords;
use App\Model\Facade\CreateUserFacade;
use App\Model\Database\EntityManager;

/**
 * Users management.
 */
final class UserManager implements Nette\Security\Authenticator
{
	use Nette\SmartObject;

	private CreateUserFacade $createUserFacade;

	private Passwords $passwords;

	private EntityManager $entityManager;

	public function __construct(
		CreateUserFacade $createUserFacade,
		Passwords $passwords,
		EntityManager $entityManager
	) {
		$this->createUserFacade = $createUserFacade;
		$this->passwords = $passwords;
		$this->entityManager = $entityManager;
	}


	/**
	 * Performs an authentication.
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(string $username, string $password): Nette\Security\SimpleIdentity
	{

		$userRepository = $this->entityManager->getUserRepository();
		$user = $userRepository->getUserByName($username);

		if (!$user) {
			throw new Nette\Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);
		} elseif (!$this->passwords->verify($password, $user->getPasswordHash())) {
			throw new Nette\Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);
		} elseif ($this->passwords->needsRehash($user->getPasswordHash())) {
			$user->changePasswordHash($this->passwords->hash($password));
		}

		return $user->toSimpleIdentity();
	}


	/**
	 * Adds new user.
	 * @throws DuplicateNameException
	 */
	public function add(string $username, string $email, string $password): void
	{
		Nette\Utils\Validators::assert($email, 'email');
		try {
			$this->createUserFacade->createUser(["username" => $username, "email" => $email, "password" => $password]);
		} catch (Nette\Database\UniqueConstraintViolationException $e) {
			throw new DuplicateNameException;
		}
	}
}



class DuplicateNameException extends \Exception
{
}
