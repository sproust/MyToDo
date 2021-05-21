<?php

namespace App\Model\Database;

use Nettrine\ORM\EntityManagerDecorator;

/**
 * Custom EntityManager
 */
class EntityManager extends EntityManagerDecorator
{

	use TRepositories;

}