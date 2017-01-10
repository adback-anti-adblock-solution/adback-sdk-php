<?php

namespace Dekalee\AdbackAnalytics\Driver;

/**
 * Interface ScriptCacheInterface
 */
interface ScriptCacheInterface
{
    /**
     * @return bool
     */
    public function isAnalyticsConfigured();

    /**
     * @param string $domain
     */
    public function setAnalyticsUrl($domain);

    /**
     * @return string
     */
    public function getAnalyticsUrl();

    /**
     * @param string $script
     */
    public function setAnalyticsScript($script);

    /**
     * @return string
     */
    public function getAnalyticsScript();

    /**
     * @return bool
     */
    public function isMessageConfigured();

    /**
     * @param string $domain
     */
    public function setMessageUrl($domain);

    /**
     * @return string
     */
    public function getMessageUrl();

    /**
     * @param string $script
     */
    public function setMessageScript($script);

    /**
     * @return string
     */
    public function getMessageScript();

    /**
     * Clear analytics data
     */
    public function clearAnalyticsData();

    /**
     * Clear message data
     */
    public function clearMessageData();
}
