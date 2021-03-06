<?php declare(strict_types = 1);

namespace ISPA\ApiClients\App\Lotus\Entity;

class UserGroupCreateEntity
{

	/** @var string */
	private $gid;

	/** @var string */
	private $name;

	public function __construct(string $gid, string $name)
	{
		$this->gid = $gid;
		$this->name = $name;
	}

	public function getGid(): string
	{
		return $this->gid;
	}

	public function getName(): string
	{
		return $this->name;
	}

}
