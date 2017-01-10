<?php

namespace Dekalee\AdbackAnalytics\Driver;

/**
 * Class RedisScriptCache
 */
class RedisScriptCache implements ScriptCacheInterface
{
    protected $redis;

    /**
     * @param \Redis $redis
     */
    public function __construct(\Redis $redis)
    {
        $this->redis = $redis;
    }

    /**
     * @return bool
     */
    public function isAnalyticsConfigured()
    {
        return $this->redis->exists('adback_analytics_url');
    }

    /**
     * @param string $domain
     */
    public function setAnalyticsUrl($domain)
    {
        $this->redis->set('adback_analytics_url', $domain);
    }

    /**
     * @return string
     */
    public function getAnalyticsUrl()
    {
        return $this->redis->get('adback_analytics_url');
    }

    /**
     * @param string $script
     */
    public function setAnalyticsScript($script)
    {
        $this->redis->set('adback_analytics_script', $script);
    }

    /**
     * @return string
     */
    public function getAnalyticsScript()
    {
        return $this->redis->get('adback_analytics_script');
    }

    /**
     * @return bool
     */
    public function isMessageConfigured()
    {
        return $this->redis->exists('adback_message_url');
    }

    /**
     * @param string $domain
     */
    public function setMessageUrl($domain)
    {
        $this->redis->set('adback_message_url', $domain);
    }

    /**
     * @return string
     */
    public function getMessageUrl()
    {
        return $this->redis->get('adback_message_url');
    }

    /**
     * @param string $script
     */
    public function setMessageScript($script)
    {
        $this->redis->set('adback_message_script', $script);
    }

    /**
     * @return string
     */
    public function getMessageScript()
    {
        return $this->redis->get('adback_message_script');
    }

    /**
     * Clear analytics data
     */
    public function clearAnalyticsData()
    {
        $this->redis->del('adback_analytics_url', 'adback_analytics_script');
    }

    /**
     * Clear message data
     */
    public function clearMessageData()
    {
        $this->redis->del('adback_message_url', 'adback_message_script');
    }

}
