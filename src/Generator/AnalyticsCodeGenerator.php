<?php

namespace Adback\ApiClient\Generator;

/**
 * Class AnalyticsCodeGenerator
 */
class AnalyticsCodeGenerator extends AbstractScriptGenerator implements ScriptGeneratorInterface
{
    /**
     * @return string
     */
    public function generate()
    {
        if (!$this->cache->isAnalyticsConfigured()) {
            return '';
        }

        return $this->cache->getAnalyticsCode();
    }
}
