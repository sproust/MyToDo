<?php

namespace App\Model\Database\Entity\Attributes;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait TEditedAt
{
    /**
	 * @var DateTime|NULL
	 * @ORM\Column(type="datetime", nullable=TRUE)
	 */
	protected $edited_at;

	public function getEditedAt(): ?DateTime
	{
		return $this->edited_at;
	}

	/**
	 * Doctrine annotation
	 *
	 * @ORM\PrePersist
	 * @internal
	 */
	public function setEditedAt(): void
	{
		$this->edited_at = new DateTime();
	}

}