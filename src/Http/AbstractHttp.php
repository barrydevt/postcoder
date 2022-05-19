<?php

namespace Barrydevt\Postcoder\Http;

/**
 * Class AbstractHttp
 * @package Barrydevt\Postcoder\Http
 */
class AbstractHttp
{
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

}
