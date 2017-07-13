<?php

namespace Adback\ApiClient\Generator;

/**
 * Class MessageScriptGenerator
 */
class MessageScriptGenerator extends AbstractScriptGenerator implements ScriptGeneratorInterface
{
    /**
     * @return string
     */
    public function generate()
    {
        if (!$this->cache->isMessageConfigured()) {
            return '';
        }

        $url = $this->cache->getMessageUrl();
        $script = $this->cache->getMessageScript();

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
