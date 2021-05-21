<?php

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\User;

class UserRepository extends BaseRepository
{

    public function getUser($username): User
    {
        
        return $this->findOneBy(["username" => $username]);

        
    }
}
