<?php declare(strict_types = 1);

namespace ISPA\ApiClients\App\Ruian\Client;

use ISPA\ApiClients\Domain\AbstractHttpClient;
use Psr\Http\Message\ResponseInterface;

class MetaClient extends AbstractHttpClient
{

	private const BASE_URL = 'meta';

	public function getMeta(): ResponseInterface
	{
		return $this->httpClient->request('GET', sprintf('%s', self::BASE_URL));
	}

	public function getModelInfo(string $restModelName): ResponseInterface
	{
		return $this->httpClient->request('GET', sprintf('%s/model-info/%s', self::BASE_URL, $restModelName));
	}

}
