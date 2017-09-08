<?php

namespace Adback\ApiClient\Generator;

/**
 * Class IabBannerCodeGenerator
 */
class IabBannerCodeGenerator extends AbstractScriptGenerator implements ScriptGeneratorInterface
{
    /**
     * @return string
     */
    public function generate()
    {
        if (!$this->cache->isIabBannerConfigured()) {
            return '';
        }

        return $this->cache->getIabBannerCode();
    }
}
