<?php

namespace Barrydevt\Postcoder;

use Barrydevt\Postcoder\Exceptions\AuthenticationException;

class Client implements AddressServiceClientInterface
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    protected $countryCode;

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
    public function __construct()
    {
        $this->httpClient = new \Barrydevt\Postcoder\Http\Curl();
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

    /**
     * @return array
     */
    protected function clientRequest(): array
    {
        $requestUrl = "https://ws.postcoder.com/pcw/$this->apiKey/address/$this->countryCode/" . urlencode($this->term);
        return $this->httpClient->call($requestUrl);
    }
}
