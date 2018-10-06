<?php declare(strict_types = 1);

namespace ISPA\ApiClients\App\Adminus\Requestor;

use ISPA\ApiClients\App\Adminus\Client\ContractClient;
use ISPA\ApiClients\Domain\AbstractRequestor;
use Psr\Http\Message\ResponseInterface;

class ContractRequestor extends AbstractRequestor
{

	/** @var ContractClient */
	private $client;

	public function __construct(ContractClient $client)
	{
		$this->client = $client;
	}

	/**
	 * @param string|int $id
	 */
	public function getById($id): ResponseInterface
	{
		return $this->client->getById($id);
	}

	/**
	 * @param string|int $contractNumber
	 */
	public function getByContractNumber($contractNumber): ResponseInterface
	{
		return $this->client->getByContractNumber($contractNumber);
	}

	/**
	 * @param string|int $customerId
	 */
	public function getByCustomer($customerId): ResponseInterface
	{
		return $this->client->getByCustomer($customerId);
	}

	/**
	 * @param string|int $cardNumber
	 */
	public function getByCustomerCard($cardNumber): ResponseInterface
	{
		return $this->client->getByCustomerCard($cardNumber);
	}

	/**
	 * @param string|int $attributeSetId
	 */
	public function getByAttributeSetId($attributeSetId): ResponseInterface
	{
		return $this->client->getByAttributeSetId($attributeSetId);
	}

	public function getOnlyActive(): ResponseInterface
	{
		return $this->client->getOnlyActive();
	}

	/**
	 * @param string|int $contractId
	 * @param string|int $stateId
	 */
	public function setStateById($contractId, $stateId): ResponseInterface
	{
		return $this->client->setStateById($contractId, $stateId);
	}

	/**
	 * @param string|int $contractNumber
	 * @param string|int $stateId
	 */
	public function setStateByContractNumber($contractNumber, $stateId): ResponseInterface
	{
		return $this->client->setStateByContractNumber($contractNumber, $stateId);
	}

	public function getAllContractTypeStates(): ResponseInterface
	{
		return $this->client->getAllContractTypeStates();
	}

	/**
	 * @param string|int $id
	 */
	public function getContractTypeStateById($id): ResponseInterface
	{
		return $this->client->getContractTypeStateById($id);
	}

}
