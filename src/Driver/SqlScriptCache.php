<?php

namespace Adback\ApiClient\Driver;

/**
 * Class SqlScriptCache
 */
abstract class SqlScriptCache
{
    const ADBACK_ANALYTICS_SCRIPT = 'adback_analytics_script';
    const ADBACK_ANALYTICS_URL = 'adback_analytics_url';
    const ADBACK_ANALYTICS_CODE = 'adback_analytics_code';
    const ADBACK_MESSAGE_SCRIPT = 'adback_message_script';
    const ADBACK_MESSAGE_URL = 'adback_message_url';
    const ADBACK_MESSAGE_CODE = 'adback_message_code';
    const ADBACK_AUTOPROMO_BANNER_SCRIPT = 'adback_autopromo_banner_script';
    const ADBACK_AUTOPROMO_BANNER_URL = 'adback_autopromo_banner_url';
    const ADBACK_AUTOPROMO_BANNER_CODE = 'adback_autopromo_banner_code';
    const ADBACK_PRODUCT_SCRIPT = 'adback_product_script';
    const ADBACK_PRODUCT_URL = 'adback_product_url';
    const ADBACK_PRODUCT_CODE = 'adback_product_code';
    const ADBACK_IAB_BANNER_SCRIPT = 'adback_iab_banner_script';
    const ADBACK_IAB_BANNER_CODE = 'adback_iab_banner_code';

    /**
     * @return bool
     */
    public function isAnalyticsConfigured()
    {
        return null != $this->get(self::ADBACK_ANALYTICS_SCRIPT);
    }

    /**
     * @param string $domain
     */
    public function setAnalyticsUrl($domain)
    {
        $this->set(self::ADBACK_ANALYTICS_URL, $domain);
    }

    /**
     * @return string
     */
    public function getAnalyticsUrl()
    {
        return $this->get(self::ADBACK_ANALYTICS_URL);
    }

    /**
     * @param string $script
     */
    public function setAnalyticsScript($script)
    {
        $this->set(self::ADBACK_ANALYTICS_SCRIPT, $script);
    }

    /**
     * @return string
     */
    public function getAnalyticsScript()
    {
        return $this->get(self::ADBACK_ANALYTICS_SCRIPT);
    }

    /**
     * @param string $code
     */
    public function setAnalyticsCode($code)
    {
        $this->set(self::ADBACK_ANALYTICS_CODE, $code);
    }

    /**
     * @return string
     */
    public function getAnalyticsCode()
    {
        return $this->get(self::ADBACK_ANALYTICS_CODE);
    }

    /**
     * @return bool
     */
    public function isMessageConfigured()
    {
        return null != $this->get(self::ADBACK_MESSAGE_SCRIPT);
    }

    /**
     * @param string $domain
     */
    public function setMessageUrl($domain)
    {
        $this->set(self::ADBACK_MESSAGE_URL, $domain);
    }

    /**
     * @return string
     */
    public function getMessageUrl()
    {
        return $this->get(self::ADBACK_MESSAGE_URL);
    }

    /**
     * @param string $script
     */
    public function setMessageScript($script)
    {
        $this->set(self::ADBACK_MESSAGE_SCRIPT, $script);
    }

    /**
     * @return string
     */
    public function getMessageScript()
    {
        return $this->get(self::ADBACK_MESSAGE_SCRIPT);
    }

    /**
     * @param string $code
     */
    public function setMessageCode($code)
    {
        $this->set(self::ADBACK_MESSAGE_CODE, $code);
    }

    /**
     * @return string
     */
    public function getMessageCode()
    {
        return $this->get(self::ADBACK_MESSAGE_CODE);
    }

    /**
     * @return bool
     */
    public function isAutopromoBannerConfigured()
    {
        return null != $this->get(self::ADBACK_AUTOPROMO_BANNER_SCRIPT);
    }

    /**
     * @param string $domain
     */
    public function setAutopromoBannerUrl($domain)
    {
        $this->set(self::ADBACK_AUTOPROMO_BANNER_URL, $domain);
    }

    /**
     * @return string
     */
    public function getAutopromoBannerUrl()
    {
        return $this->get(self::ADBACK_AUTOPROMO_BANNER_URL);
    }

    /**
     * @param string $script
     */
    public function setAutopromoBannerScript($script)
    {
        $this->set(self::ADBACK_AUTOPROMO_BANNER_SCRIPT, $script);
    }

    /**
     * @return string
     */
    public function getAutopromoBannerScript()
    {
        return $this->get(self::ADBACK_AUTOPROMO_BANNER_SCRIPT);
    }

    /**
     * @param string $code
     */
    public function setAutopromoBannerCode($code)
    {
        $this->set(self::ADBACK_AUTOPROMO_BANNER_CODE, $code);
    }

    /**
     * @return string
     */
    public function getAutopromoBannerCode()
    {
        return $this->get(self::ADBACK_AUTOPROMO_BANNER_CODE);
    }

    /**
     * @return bool
     */
    public function isIabBannerConfigured()
    {
        return null != $this->get(self::ADBACK_IAB_BANNER_SCRIPT);
    }

    /**
     * @param string $script
     */
    public function setIabBannerScript($script)
    {
        $this->set(self::ADBACK_IAB_BANNER_SCRIPT, $script);
    }

    /**
     * @return string
     */
    public function getIabBannerScript()
    {
        return $this->get(self::ADBACK_IAB_BANNER_SCRIPT);
    }

    /**
     * @param string $code
     */
    public function setIabBannerCode($code)
    {
        $this->set(self::ADBACK_IAB_BANNER_CODE, $code);
    }

    /**
     * @return string
     */
    public function getIabBannerCode()
    {
        return $this->get(self::ADBACK_IAB_BANNER_CODE);
    }

    /**
     * @return bool
     */
    public function isProductConfigured()
    {
        return null != $this->get(self::ADBACK_PRODUCT_SCRIPT);
    }

    /**
     * @param string $domain
     */
    public function setProductUrl($domain)
    {
        $this->set(self::ADBACK_PRODUCT_URL, $domain);
    }

    /**
     * @return string
     */
    public function getProductUrl()
    {
        return $this->get(self::ADBACK_PRODUCT_URL);
    }

    /**
     * @param string $script
     */
    public function setProductScript($script)
    {
        $this->set(self::ADBACK_PRODUCT_SCRIPT, $script);
    }

    /**
     * @return string
     */
    public function getProductScript()
    {
        return $this->get(self::ADBACK_PRODUCT_SCRIPT);
    }

    /**
     * @param string $code
     */
    public function setProductCode($code)
    {
        $this->set(self::ADBACK_PRODUCT_CODE, $code);
    }

    /**
     * @return string
     */
    public function getProductCode()
    {
        return $this->get(self::ADBACK_PRODUCT_CODE);
    }

    /**
     * Clear analytics data
     */
    public function clearAnalyticsData()
    {
        $this->clear(self::ADBACK_ANALYTICS_SCRIPT);
        $this->clear(self::ADBACK_ANALYTICS_URL);
        $this->clear(self::ADBACK_ANALYTICS_CODE);
    }

    /**
     * Clear message data
     */
    public function clearMessageData()
    {
        $this->clear(self::ADBACK_MESSAGE_SCRIPT);
        $this->clear(self::ADBACK_MESSAGE_URL);
        $this->clear(self::ADBACK_MESSAGE_CODE);
    }

    /**
     * Clear autopromo banner data
     */
    public function clearAutopromoBannerData()
    {
        $this->clear(self::ADBACK_AUTOPROMO_BANNER_SCRIPT);
        $this->clear(self::ADBACK_AUTOPROMO_BANNER_URL);
        $this->clear(self::ADBACK_AUTOPROMO_BANNER_CODE);
    }

    /**
     * Clear autopromo banner data
     */
    public function clearProductData()
    {
        $this->clear(self::ADBACK_PRODUCT_SCRIPT);
        $this->clear(self::ADBACK_PRODUCT_URL);
        $this->clear(self::ADBACK_PRODUCT_CODE);
    }

    /**
     * Clear autopromo banner data
     */
    public function clearIabBannerData()
    {
        $this->clear(self::ADBACK_IAB_BANNER_SCRIPT);
        $this->clear(self::ADBACK_IAB_BANNER_CODE);
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    abstract protected function get($key);

    /**
     * @param string $key
     * @param string $value
     */
    abstract protected function set($key, $value);

    /**
     * @param string $key
     */
    abstract protected function clear($key);
}
