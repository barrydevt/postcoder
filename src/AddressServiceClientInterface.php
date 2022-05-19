<?php

namespace Barrydevt\Postcoder;

interface AddressServiceClientInterface
{
    /**
     * Set the country code for the service
     * @param string $countryCode
     * @return AddressServiceClientInterface
     */
    public function setCountryCode(string $countryCode): AddressServiceClientInterface;

    /**
     * Set the search term for the address service
     * @param string $term
     * @return AddressServiceClientInterface
     */
    public function searchFor(string $term): AddressServiceClientInterface;

    /**
     * Gets the results from the address service
     * @return array
     */
    public function get(): array;
}
