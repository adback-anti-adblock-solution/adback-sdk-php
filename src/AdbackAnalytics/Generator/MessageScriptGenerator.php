<?php

namespace Dekalee\AdbackAnalytics\Generator;

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
(function (a,d){var s,t,u;s=d.createElement('script');
    if(d.referrer){u=d.createElement('a');u.href=d.referrer;a=a+u.hostname;}
    s.src=a;s.async=1;
    t=d.getElementsByTagName('script')[0];
    t.parentNode.insertBefore(s,t);
})("https://$url/$script.js?ref=", document);
EOS;

        return $script;
    }
}
