<?php

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\Task;

class TaskRepository extends BaseRepository
{
    public function getAllUndoneTasks()
    {
        return $this->findBy(["done" => 0]);
    }

    public function getAllDoneTasks()
    {
        return $this->findBy(["done" => 1]);
    }

    public function getTask($taskId)
    {
        return $this->findOneBy(["id" => $taskId]);
    }

    public function getUsersUndoneTasks($userId)
    {
        return $this->findBy(["done" => 0, "user" => $userId]);
    }

    public function getUsersDoneTasks($userId)
    {
        return $this->findBy(["done" => 1, "user" => $userId]);
    }
}
