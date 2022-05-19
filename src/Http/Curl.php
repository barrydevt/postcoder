<?php

namespace Barrydevt\Postcoder\Http;

use Barrydevt\Postcoder\Exceptions\AuthenticationException;
use Barrydevt\Postcoder\Exceptions\ResponseException;

/**
 * Class Curl
 * @package Barrydevt\Postcoder\Http
 */
class Curl extends AbstractHttp
{
    /**
     * @param $url
     * @return array
     */
    public function call(string $url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_close($curl);
        return $this->processResponse($curl)->getResponse();
    }

    /**
     * @param $result
     * @return $this
     * @throws AuthenticationException
     */
    public function processResponse($result)
    {
        $rawString = curl_exec($result);
        if(curl_error($result) || !$rawString) {
            $this->responseError = true;
            throw new ResponseException(__('Could not get a response from the API'));
        }

        $this->responseError = false;
        $this->response = json_decode($rawString,true);

        return $this;
    }
}
