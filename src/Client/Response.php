<?php

namespace Adback\ApiClient\Client;

/**
 * Class Response
 */
class Response
{
    protected $body;

    /**
     * @param $body
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return 200;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }
}
