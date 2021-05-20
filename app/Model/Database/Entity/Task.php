<?php

namespace App\Model\Database\Entity;

use App\Model\Database\Entity\Attributes\TCreatedAt;
use App\Model\Database\Entity\Attributes\TEditedAt;
use App\Model\Database\Entity\Attributes\TId;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\TaskRepository")
 * @ORM\Table(name="`tasks`")
 * @ORM\HasLifecycleCallbacks
 */
class Task extends BaseEntity
{

    use TId;
    use TCreatedAt;
    use TEditedAt;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=FALSE, unique=false)
     */
    private $task;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=FALSE)
     */
    private $deadline;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", length=1, nullable=FALSE)
     */
    private $done;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tasks")
     */
    private $user;

    public function __construct(string $task, DateTime $deadline, bool $done, User $user)
    {
        $this->task = $task;
        $this->deadline = $deadline;
        $this->done = $done;
        $this->user = $user;
    }

    public function getTask()
    {
        return $this->task;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }

    public function getDone()
    {
        return $this->done;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setTask(string $task)
    {
        $this->task = $task;
    }

    public function setDeadline(DateTime $deadline)
    {
        $this->deadline = $deadline;
    }

    public function setDone(bool $done)
    {
        $this->done = $done;
    }

    public function setUser(User $user)
    {
        $user->addTask($this);
        $this->user = $user;
    }
}
