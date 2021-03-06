<?php

namespace Adback\ApiClient\Generator;

/**
 * Class AnalyticsScriptGenerator
 */
class AnalyticsScriptGenerator extends AbstractScriptGenerator implements ScriptGeneratorInterface
{
    /**
     * @return string
     */
    public function generate()
    {
        if (!$this->cache->isAnalyticsConfigured()) {
            return '';
        }

        $url = $this->cache->getAnalyticsUrl();
        $script = $this->cache->getAnalyticsScript();

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
