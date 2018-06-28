<?php

namespace Adback\ApiClient\Driver;

use Predis\Client;

/**
 * Class PredisScriptCache
 */
class PredisScriptCache extends AbstractRedisCache implements ScriptCacheInterface
{
    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->redis = $client;
    }
}
