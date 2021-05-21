<?php

namespace App\Model\Database\Entity\Attributes;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait TEditedAt
{
    /**
	 * @var DateTime|NULL
	 * @ORM\Column(name="edited_at", type="datetime", nullable=TRUE)
	 */
	protected $edited_at;

	public function getEditedAt(): ?DateTime
	{
		return $this->edited_at;
	}

	/**
	 * @ORM\PrePersist
	 * @internal
	 */
	public function setEditedAt(): void
	{
		$this->edited_at = new DateTime();
	}

}