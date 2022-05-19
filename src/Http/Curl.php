<?php

namespace Barrydevt\Postcoder\Http;

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
        $result = file_get_contents($url, false, stream_context_create(["http" => ["ignore_errors" => true]]));
        return $this->processResponse($result)->getResponse();
    }
}
