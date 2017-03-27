<?php

namespace Dekalee\AdbackAnalytics\Generator;

use Dekalee\AdbackAnalytics\Exception\AutopromoBannerIdMissing;

/**
 * Class AutopromoBannerScriptGenerator
 */
class AutopromoBannerScriptGenerator extends AbstractScriptGenerator implements ScriptGeneratorInterface
{
    /**
     * @param int $id
     *
     * @return string
     *
     * @throws AutopromoBannerIdMissing
     */
    public function generate($id = null)
    {
        if(is_null($id)) {
            throw new AutopromoBannerIdMissing();
        }

        if (!$this->cache->isAutopromoBannerConfigured()) {
            return '';
        }

        $url = $this->cache->getAutopromoBannerUrl();
        $script = $this->cache->getAutopromoBannerScript();

        $script = <<<EOS
(function (a,d){var s,t,cs,ds,dd;s=d.createElement('script');cs=d.currentScript;
    ds=d.createElement('span');ds.id=Math.random().toString(36).substring(7);
    dd=cs.parentNode.insertBefore(ds,cs);
    s.src=a;s.async=1;s.setAttribute('data-name',ds.id);s.setAttribute('data-id',$id);
    t=d.getElementsByTagName('script')[0];t.parentNode.insertBefore(s,t);})
("https://$url/$script.js", document);
EOS;

        return $script;
    }
}
