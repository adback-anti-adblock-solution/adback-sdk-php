<?php

namespace Adback\ApiClient\Driver;

/**
 * Class RedisScriptCache
 */
class RedisScriptCache extends AbstractRedisCache implements ScriptCacheInterface
{
    /**
     * @param \Redis $redis
     */
    public function __construct(\Redis $redis)
    {
        $this->redis = $redis;
    }
}
