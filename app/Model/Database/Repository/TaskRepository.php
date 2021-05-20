<?php

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\Task;

class TaskRepository extends BaseRepository
{
    public function getAllUndoneTasks()
    {
        $this->findBy(["done" => 0]);
    }

    public function getAllDoneTasks()
    {
        $this->findBy(["done" => 1]);
    }

    public function getTask($taskId)
    {
        $this->findOneBy(["id" => $taskId]);
    }

    public function getUsersUndoneTasks($userId)
    {
        $this->findBy(["done" => 0, "user_id" => $userId]);
    }

    public function getUsersDoneTasks($userId)
    {
        $this->findBy(["done" => 1, "user_id" => $userId]);
    }
}
