<?php declare(strict_types = 1);

namespace ISPA\ApiClients\App\Lotus\Requestor;

use ISPA\ApiClients\App\Lotus\Client\UserClient;
use ISPA\ApiClients\App\Lotus\Entity\UserCreateEntity;
use ISPA\ApiClients\App\Lotus\Entity\UserEditEntity;
use ISPA\ApiClients\App\Lotus\Filter\UserListFilter;

/**
 * @property UserClient $client
 */
final class UserRequestor extends BaseRequestor
{

	public function __construct(UserClient $client)
	{
		parent::__construct($client);
	}

	/**
	 * @return mixed[]
	 */
	public function list(int $limit = 10, int $offset = 0, ?UserListFilter $filter = NULL): array
	{
		$response = $this->client->list($limit, $offset, $filter);

		return $this->processResponse($response)->getData();
	}

	/**
	 * @return mixed[]
	 */
	public function getById(int $id): array
	{
		$response = $this->client->getById($id);

		return $this->processResponse($response)->getData();
	}

	/**
	 * @return mixed[]
	 */
	public function create(UserCreateEntity $entity): array
	{
		$response = $this->client->create($entity);

		return $this->processResponse($response)->getData();
	}

	/**
	 * @return mixed[]
	 */
	public function edit(UserEditEntity $entity): array
	{
		$response = $this->client->edit($entity);

		return $this->processResponse($response)->getData();
	}

}
