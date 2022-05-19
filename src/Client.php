<?php

namespace Barrydevt\Postcoder;

use Barrydevt\Postcoder\Exceptions\AuthenticationException;
use Barrydevt\Postcoder\Http\Curl;

/**
 * Class Client
 * @package Barrydevt\Postcoder
 */
class Client implements AddressServiceClientInterface
{
    const API_ENDPOINT = 'https://ws.postcoder.com/pcw/';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    protected $countryCode = 'GB';

    /**
     * @var string
     */
    protected $term;

    /**
     * @var Http\Curl
     */
    protected $httpClient;

    /**
     * Client constructor.
     */
    public function __construct(Curl $httpAdapter)
    {
        $this->httpClient = $httpAdapter;
        $this->loadApiKey();
    }

    /**
     * Loads API key from config
     */
    protected function loadApiKey(): void
    {
        $apiKey = config('services.postcoder.api_key');
        if (!$apiKey) {
            throw new AuthenticationException(__('You must provide a Postcoder API key'));
        }
        $this->setApiKey($apiKey);
    }

    /**
     * Set the API key
     * @param string $apiKey
     */
    protected function setApiKey(string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @inheritDoc
     */
    public function setCountryCode(string $countryCode): AddressServiceClientInterface
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function searchFor(string $term): AddressServiceClientInterface
    {
        $this->term = $term;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function get(): array
    {
        return $this->clientRequest();
    }

    protected function getApiRequestUrl()
    {
        return implode('/',[
            self::API_ENDPOINT,
            $this->apiKey,
            $this->apiResource,
            $this->countryCode,
            urlencode($this->term)
        ]);
    }

    /**
     * @return array
     */
    protected function clientRequest(): array
    {
        return $this->httpClient->call($this->getApiRequestUrl());
    }
}
