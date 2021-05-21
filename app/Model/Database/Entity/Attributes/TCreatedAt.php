<?php

namespace App\Model\Database\Entity\Attributes;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait TCreatedAt
{
	/**
	 * @var DateTime|NULL
	 * @ORM\Column(type="datetime", nullable=TRUE)
	 */
	protected $created_at;

	public function getCreatedAt(): ?DateTime
	{
		return $this->created_at;
	}

	/**
	 * Doctrine annotation
	 *
	 * @ORM\PrePersist
	 * @internal
	 */
	public function setCreatedAt(): void
	{
		$this->created_at = new DateTime();
	}
}
