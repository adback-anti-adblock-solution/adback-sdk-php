<?php

namespace Adback\ApiClient\Generator;

/**
 * Class MessageCodeGenerator
 */
class MessageCodeGenerator extends AbstractScriptGenerator implements ScriptGeneratorInterface
{
    /**
     * @return string
     */
    public function generate()
    {
        if (!$this->cache->isMessageConfigured()) {
            return '';
        }

        return $this->cache->getMessageCode();
    }
}
