<?php 

namespace App\Model\Database;

use App\Model\Database\Repository\BaseRepository;
use Doctrine\Persistence\ObjectRepository;
use Nettrine\ORM\EntityManagerDecorator;

class EntityManager extends EntityManagerDecorator
{

	/**
	 * @param string $entityName
	 * @return BaseRepository<T>|ObjectRepository<T>
	 * @internal
	 */
	public function getRepository($entityName): ObjectRepository
	{
		return parent::getRepository($entityName);
	}

}