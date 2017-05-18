<?php

namespace Dekalee\AdbackAnalytics\Generator;

/**
 * Class AutopromoBannerScriptGenerator
 */
class AutopromoBannerScriptGenerator extends AbstractScriptGenerator implements ScriptGeneratorInterface
{
    /**
     * @return string
     */
    public function generate()
    {
        if (!$this->cache->isAutopromoBannerConfigured()) {
            return '';
        }

        $url = $this->cache->getAutopromoBannerUrl();
        $script = $this->cache->getAutopromoBannerScript();

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
