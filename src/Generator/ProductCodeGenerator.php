<?php

namespace Adback\ApiClient\Generator;

/**
 * Class ProductCodeGenerator
 */
class ProductCodeGenerator extends AbstractScriptGenerator implements ScriptGeneratorInterface
{
    /**
     * @return string
     */
    public function generate()
    {
        if (!$this->cache->isProductConfigured()) {
            return '';
        }

        return $this->cache->getProductCode();
    }
}
