<?php

namespace Adback\ApiClient\Driver;

/**
 * Class AbstractRedisCache
 */
abstract class AbstractRedisCache
{
    protected $redis;

    /**
     * @return bool
     */
    public function isAnalyticsConfigured()
    {
        return $this->redis->exists('adback_analytics_script');
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
     * @param string $code
     */
    public function setAnalyticsCode($code)
    {
        $this->redis->set('adback_analytics_code', $code);
    }

    /**
     * @return string
     */
    public function getAnalyticsCode()
    {
        return $this->redis->get('adback_analytics_code');
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
     * @param string $code
     */
    public function setMessageCode($code)
    {
        $this->redis->set('adback_message_code', $code);
    }

    /**
     * @return string
     */
    public function getMessageCode()
    {
        return $this->redis->get('adback_message_code');
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
     * @param string $code
     */
    public function setAutopromoBannerCode($code)
    {
        $this->redis->set('adback_autopromo_banner_code', $code);
    }

    /**
     * @return string
     */
    public function getAutopromoBannerCode()
    {
        return $this->redis->get('adback_autopromo_banner_code');
    }

    /**
     * @return bool
     */
    public function isProductConfigured()
    {
        return $this->redis->exists('adback_product_script');
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
     * @param string $code
     */
    public function setProductCode($code)
    {
        $this->redis->set('adback_product_code', $code);
    }

    /**
     * @return string
     */
    public function getProductCode()
    {
        return $this->redis->get('adback_product_code');
    }

    /**
     * @return bool
     */
    public function isIabBannerConfigured()
    {
        return $this->redis->exists('adback_iab_banner_script');
    }

    /**
     * @param string $script
     */
    public function setIabBannerScript($script)
    {
        $this->redis->set('adback_iab_banner_script', $script);
    }

    /**
     * @return string
     */
    public function getIabBannerScript()
    {
        return $this->redis->get('adback_iab_banner_script');
    }

    /**
     * @param string $code
     */
    public function setIabBannerCode($code)
    {
        $this->redis->set('adback_iab_banner_code', $code);
    }

    /**
     * @return string
     */
    public function getIabBannerCode()
    {
        return $this->redis->get('adback_iab_banner_code');
    }

    /**
     * @param string $domain
     */
    public function setIabBannerUrl($domain)
    {
        $this->redis->set('adback_iab_banner_url', $domain);
    }

    /**
     * @return string
     */
    public function getIabBannerUrl()
    {
        return $this->redis->get('adback_iab_banner_url');
    }

    /**
     * Clear analytics data
     */
    public function clearAnalyticsData()
    {
        $this->redis->del('adback_analytics_url', 'adback_analytics_script', 'adback_analytics_code');
    }

    /**
     * Clear message data
     */
    public function clearMessageData()
    {
        $this->redis->del('adback_message_url', 'adback_message_script', 'adback_message_code');
    }

    /**
     * Clear autopromo banner data
     */
    public function clearAutopromoBannerData()
    {
        $this->redis->del('adback_autopromo_banner_url', 'adback_autopromo_banner_script', 'adback_autopromo_banner_code');
    }

    /**
     * Clear autopromo banner data
     */
    public function clearProductData()
    {
        $this->redis->del('adback_product_url', 'adback_product_script', 'adback_product_code');
    }

    /**
     * Clear autopromo banner data
     */
    public function clearIabBannerData()
    {
        $this->redis->del('adback_iab_banner_url', 'adback_iab_banner_script', 'adback_iab_banner_code');
    }
}
