<?php

namespace App\Model\Database\Entity\Attributes;

trait TId
{

	private $id;

	public function getId(): int
	{
		return $this->id;
	}


	public function __clone()
	{
		$this->id = null;
	}

}