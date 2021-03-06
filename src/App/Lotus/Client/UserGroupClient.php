<?php declare(strict_types = 1);

namespace ISPA\ApiClients\App\Lotus\Client;

use ISPA\ApiClients\App\Lotus\Entity\UserGroupCreateEntity;
use ISPA\ApiClients\App\Lotus\Entity\UserGroupEditEntity;
use ISPA\ApiClients\Http\Utils\Helpers;
use Nette\Utils\Json;
use Psr\Http\Message\ResponseInterface;

class UserGroupClient extends AbstractLotusClient
{

	private const PATH = 'user-groups';

	/**
	 * @param int[] $userIds
	 */
	public function appendUsers(string $id, array $userIds, bool $includeSystemUsers = FALSE, bool $includeBlockedUsers = FALSE): ResponseInterface
	{
		$query = [
			'system' => $includeSystemUsers ? 'true' : 'false',
			'blocked' => $includeBlockedUsers ? 'true' : 'false',
		];
		$query = Helpers::buildQuery($query);

		return $this->request(
			'PATCH',
			sprintf('%s/%s/append-users?%s', self::PATH, $id, $query),
			[
				'body' => Json::encode([
					'ids' => $userIds,
				]),
				'headers' => [
					'Content-Type' => 'application/json',
				],
			]
		);
	}

	public function findOne(int $id): ResponseInterface
	{
		return $this->request('GET', sprintf('%s/%d', self::PATH, $id));
	}

	public function createOne(UserGroupCreateEntity $entity): ResponseInterface
	{
		return $this->request(
			'POST',
			sprintf('%s', self::PATH),
			[
				'body' => Json::encode([
					'gid' => $entity->getGid(),
					'name' => $entity->getName(),
				]),
				'headers' => [
					'Content-Type' => 'application/json',
				],
			]
		);
	}

	public function editOne(UserGroupEditEntity $entity): ResponseInterface
	{
		return $this->request(
			'PUT',
			sprintf('%s/%s', self::PATH, $entity->getId()),
			[
				'body' => Json::encode([
					'gid' => $entity->getGid(),
					'name' => $entity->getName(),
				]),
				'headers' => [
					'Content-Type' => 'application/json',
				],
			]
		);
	}

	public function deleteOne(int $id): ResponseInterface
	{
		return $this->request('DELETE', sprintf('%s/%s', self::PATH, $id));
	}

}
