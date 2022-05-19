<?php

namespace Barrydevt\Postcoder\Http;

/**
 * Class AbstractHttp
 * @package Barrydevt\Postcoder\Http
 */
class AbstractHttp
{
    /**
     * @var bool
     */
    protected $responseError = null;

    /**
     * @var array
     */
    protected $response;

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * @param $result
     * @return $this
     */
    public function processResponse($result)
    {
        $this->response = json_decode($result);
        $this->responseError = false;
        return $this;
    }
}
