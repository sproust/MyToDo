<?php

namespace App\Model\Database\Entity;

use App\Model\Database\Entity\Attributes\TCreatedAt;
use App\Model\Database\Entity\Attributes\TEditedAt;
use App\Model\Database\Entity\Attributes\TId;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Nette\Security\SimpleIdentity;

/**
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\UserRepository")
 * @ORM\Table(name="`users`")
 * @ORM\HasLifecycleCallbacks
 */
class User extends BaseEntity
{

    public const ROLE_ADMIN = 'admin';
	public const ROLE_USER = 'user';

    use TId;
    use TCreatedAt;
    use TEditedAt;

    /**
     * @var string
     * @ORM\Column(name="username", type="string", length=30, nullable=FALSE, unique=true)
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=255, nullable=FALSE)
     */
    private $password;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=75, nullable=FALSE)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="role", type="string", length=10, nullable=FALSE)
     */
    private $role;

    /**
     * @var Task[]|Collection
     * @ORM\OneToMany(targetEntity="Task", mappedBy="user")
     */
    private Collection $tasks;

    public function __construct(string $username, string $passwordHash, string $email)
    {
        $this->username = $username;
        $this->password = $passwordHash;
        $this->email = $email;
        $this->role = self::ROLE_USER;
        $this->tasks = new ArrayCollection();
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPasswordHash()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function changeUsername(string $username)
    {
        $this->username = $username;
    }

    public function changeEmail(string $email)
    {
        $this->email = $email;
    }

    public function changePasswordHash(string $password)
    {
        $this->password = $password;
    }

    public function changeRole(string $role)
    {
        $this->role = $role;
    }

    public function addTask($task)
    {
        $this->tasks[] = $task;
    }

    public function toSimpleIdentity(): SimpleIdentity
    {
        return new SimpleIdentity($this->getId(), [$this->role], [
            "username" => $this->username,
            "email" => $this->email
        ]);
    }
}
