<?php

namespace App\Model\Database\Entity\Attributes;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait TCreatedAt
{
	/**
	 * @var DateTime
	 * @ORM\Column(name="created_at", type="datetime", nullable=FALSE, options={"default": "CURRENT_TIMESTAMP"})
	 */
	protected $created_at;

	public function getCreatedAt(): ?DateTime
	{
		return $this->created_at;
	}

	/**
	 * @ORM\PrePersist
	 * @internal
	 */
	public function setCreatedAt(): void
	{
		$this->created_at = new DateTime();
	}
}
