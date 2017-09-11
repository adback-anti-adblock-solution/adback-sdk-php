<?php

namespace Adback\ApiClient\Generator;

/**
 * Class AutopromoBannerCodeGenerator
 */
class AutopromoBannerCodeGenerator extends AbstractScriptGenerator implements ScriptGeneratorInterface
{
    /**
     * @return string
     */
    public function generate()
    {
        if (!$this->cache->isAutopromoBannerConfigured()) {
            return '';
        }

        return $this->cache->getAutopromoBannerCode();
    }
}
