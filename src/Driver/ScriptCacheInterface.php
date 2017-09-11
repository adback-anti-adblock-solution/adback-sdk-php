<?php

namespace Adback\ApiClient\Driver;

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
     * @param string $code
     */
    public function setAnalyticsCode($code);

    /**
     * @return string
     */
    public function getAnalyticsCode();

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
     * @param string $code
     */
    public function setMessageCode($code);

    /**
     * @return string
     */
    public function getMessageCode();

    /**
     * @return bool
     */
    public function isAutopromoBannerConfigured();

    /**
     * @param string $domain
     */
    public function setAutopromoBannerUrl($domain);

    /**
     * @return string
     */
    public function getAutopromoBannerUrl();

    /**
     * @param string $script
     */
    public function setAutopromoBannerScript($script);

    /**
     * @return string
     */
    public function getAutopromoBannerScript();

    /**
     * @param string $code
     */
    public function setAutopromoBannerCode($code);

    /**
     * @return string
     */
    public function getAutopromoBannerCode();

    /**
     * @param string $domain
     */
    public function setProductUrl($domain);

    /**
     * @return string
     */
    public function getProductUrl();

    /**
     * @param string $script
     */
    public function setProductScript($script);

    /**
     * @return string
     */
    public function getProductScript();

    /**
     * @param string $code
     */
    public function setProductCode($code);

    /**
     * @return string
     */
    public function getProductCode();

    /**
     * @return bool
     */
    public function isProductConfigured();

    /**
     * @param string $script
     */
    public function setIabBannerScript($script);

    /**
     * @return string
     */
    public function getIabBannerScript();

    /**
     * @param string $code
     */
    public function setIabBannerCode($code);

    /**
     * @return string
     */
    public function getIabBannerCode();

    /**
     * @return bool
     */
    public function isIabBannerConfigured();

    /**
     * Clear analytics data
     */
    public function clearAnalyticsData();

    /**
     * Clear message data
     */
    public function clearMessageData();

    /**
     * Clear autopromo banner data
     */
    public function clearAutopromoBannerData();

    /**
     * Clear autopromo banner data
     */
    public function clearProductData();

    /**
     * Clear autopromo banner data
     */
    public function clearIabBannerData();
}
