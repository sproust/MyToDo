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
class Task extends AbstractEntity
{

    use TId;
    use TCreatedAt;
    use TEditedAt;

    /**
     * @var string
     * @ORM\Column(type="varchar", length=255, nullable=FALSE, unique=false)
     */
    private $task;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=FALSE)
     */
    private $deadline;

    /**
     * @var bool
     * @ORM\Column(type="tinyint", length=1, nullable=FALSE)
     */
    private $done;

    /**
     * @var int
     * @ORM\Column(type="int", length=3, nullable=FALSE)
     */
    private $user_id;

    public function __construct(string $task, DateTime $deadline, bool $done, int $user_id)
    {
        $this->task = $task;
        $this->deadline = $deadline;
        $this->done = $done;
        $this->user_id = $user_id;
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

    public function getUserId()
    {
        return $this->user_id;
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

    public function setUserId(int $user_id)
    {
        $this->user_id = $user_id;
    }
}
