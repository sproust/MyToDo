<?php

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\User;

class UserRepository extends BaseRepository
{

    public function getUserByName($username): User
    {
        
        return $this->findOneBy(["username" => $username]);

    }

    public function getUserById($id): User
    {
        
        return $this->findOneBy(["id" => $id]);

    }
}
