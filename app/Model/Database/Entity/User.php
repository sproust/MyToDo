<?php

namespace App\Model\Database\Entity;

use App\Model\Database\Entity\Attributes\TCreatedAt;
use App\Model\Database\Entity\Attributes\TEditedAt;
use App\Model\Database\Entity\Attributes\TId;

use Doctrine\ORM\Mapping as ORM;
use Nette\Security\SimpleIdentity;

/**
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\UserRepository")
 * @ORM\Table(name="`users`")
 * @ORM\HasLifecycleCallbacks
 */
class User extends AbstractEntity
{

    use TId;
    use TCreatedAt;
    use TEditedAt;

    /**
     * @var string
     * @ORM\Column(type="varchar", length=30, nullable=FALSE, unique=true)
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(type="varchar", length=255, nullable=FALSE)
     */
    private $password;

    /**
     * @var string
     * @ORM\Column(type="varchar", length=75, nullable=FALSE)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="varchar", length=10, nullable=FALSE)
     */
    private $role;

    public function __construct(string $username, string $passwordHash, string $email, string $role)
    {
        $this->username = $username;
        $this->password = $passwordHash;
        $this->email = $email;
        $this->role = $role;
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

    public function toSimpleIdentity(): SimpleIdentity{
        return new SimpleIdentity($this->getId(), [$this->role], [
            "username" => $this->username,
            "email" => $this->email
        ]);
    }
}
