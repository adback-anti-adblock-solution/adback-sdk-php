<?php

namespace Adback\ApiClient\Generator;

use Adback\ApiClient\Driver\ScriptCacheInterface;

/**
 * Class AbstractScriptGenerator
 */
abstract class AbstractScriptGenerator
{
    protected $cache;

    /**
     * @param ScriptCacheInterface $cache
     */
    public function __construct(ScriptCacheInterface $cache)
    {
        $this->cache = $cache;
    }
}
