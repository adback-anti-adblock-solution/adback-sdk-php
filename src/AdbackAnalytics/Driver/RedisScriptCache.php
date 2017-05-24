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
        return $this->redis->exists('adback_message_script');
    }

    /**
     * @return bool
     */
    public function isAutopromoBannerConfigured()
    {
        return $this->redis->exists('adback_autopromo_banner_script');
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
     * @param string $domain
     */
    public function setAutopromoBannerUrl($domain)
    {
        $this->redis->set('adback_autopromo_banner_url', $domain);
    }

    /**
     * @return string
     */
    public function getAutopromoBannerUrl()
    {
        return $this->redis->get('adback_autopromo_banner_url');
    }

    /**
     * @param string $domain
     */
    public function setProductUrl($domain)
    {
        $this->redis->set('adback_product_url', $domain);
    }

    /**
     * @return string
     */
    public function getProductUrl()
    {
        return $this->redis->get('adback_product_url');
    }

    /**
     * @param string $script
     */
    public function setAutopromoBannerScript($script)
    {
        $this->redis->set('adback_autopromo_banner_script', $script);
    }

    /**
     * @return string
     */
    public function getAutopromoBannerScript()
    {
        return $this->redis->get('adback_autopromo_banner_script');
    }

    /**
     * @param string $script
     */
    public function setProductScript($script)
    {
        $this->redis->set('adback_product_script', $script);
    }

    /**
     * @return string
     */
    public function getProductScript()
    {
        return $this->redis->get('adback_product_script');
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

    /**
     * Clear autopromo banner data
     */
    public function clearAutopromoBannerData()
    {
        $this->redis->del('adback_autopromo_banner_url', 'adback_autopromo_banner_script');
    }

    /**
     * Clear autopromo banner data
     */
    public function clearProductData()
    {
        $this->redis->del('adback_product_url', 'adback_product_script');
    }

}
