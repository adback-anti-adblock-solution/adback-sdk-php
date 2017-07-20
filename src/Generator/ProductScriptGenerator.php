<?php

namespace Adback\ApiClient\Generator;

/**
 * Class ProductScriptGenerator
 */
class ProductScriptGenerator extends AbstractScriptGenerator implements ScriptGeneratorInterface
{
    /**
     * @return string
     */
    public function generate()
    {
        if (!$this->cache->isProductConfigured()) {
            return '';
        }

        $url = $this->cache->getProductUrl();
        $script = $this->cache->getProductScript();

        $script = <<<EOS
(function (a,d){var s,t;s=d.createElement('script');
    s.src=a;s.async=1;
    t=d.getElementsByTagName('script')[0];
    t.parentNode.insertBefore(s,t);
})("https://$url/$script.js", document);
EOS;

        return $script;
    }
}
