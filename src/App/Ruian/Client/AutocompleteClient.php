<?php declare(strict_types = 1);

namespace ISPA\ApiClients\App\Ruian\Client;

use ISPA\ApiClients\Domain\AbstractHttpClient;
use Psr\Http\Message\ResponseInterface;

class AutocompleteClient extends AbstractHttpClient
{

	private const BASE_URL = 'address-register-autocomplete';

	public function getDistrictsByFilter(string $filter): ResponseInterface
	{
		return $this->httpClient->request('GET', sprintf('%s/districts-by-filter/%s', self::BASE_URL, $filter));
	}

	public function getMunicipalitiesWithPartsByFilter(string $filter): ResponseInterface
	{
		return $this->httpClient->request('GET', sprintf('%s/municipalities-with-parts-by-filter/%s', self::BASE_URL, $filter));
	}

	/**
	 * @param string|int $cityCode
	 */
	public function getStreetsByCityCodeAndFilter($cityCode, string $filter): ResponseInterface
	{
		return $this->httpClient->request('GET', sprintf('%s/streets-by-filter/%s/%s', self::BASE_URL, (string) $cityCode, $filter));
	}

	/**
	 * @param string|int $cityPartCode
	 */
	public function getStreetsByCityPartCodeAndFilter($cityPartCode, string $filter): ResponseInterface
	{
		return $this->httpClient->request('GET', sprintf('%s/streets-by-part-of-city-filter/%s/%s', self::BASE_URL, (string) $cityPartCode, $filter));
	}

	/**
	 * @param string|int $streetCode
	 */
	public function getHouseNumbersByStreetCode($streetCode): ResponseInterface
	{
		return $this->httpClient->request('GET', sprintf('%s/house-numbers-by-street-code/%s', self::BASE_URL, (string) $streetCode));
	}

	/**
	 * @param string|int $cityCode
	 */
	public function getHouseNumbersWithoutStreetByCityCode($cityCode): ResponseInterface
	{
		return $this->httpClient->request('GET', sprintf('%s/house-numbers-without-street-by-city-code/%s', self::BASE_URL, (string) $cityCode));
	}

	/**
	 * @param string|int $cityPartCode
	 */
	public function getHouseNumbersWithoutStreetByCityPartCode($cityPartCode): ResponseInterface
	{
		return $this->httpClient->request('GET', sprintf('%s/house-numbers-without-street-by-part-of-city-code/%s', self::BASE_URL, (string) $cityPartCode));
	}

}
