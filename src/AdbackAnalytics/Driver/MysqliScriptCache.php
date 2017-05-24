<?php

namespace Dekalee\AdbackAnalytics\Driver;

/**
 * Class MysqliScriptCache
 */
class MysqliScriptCache implements ScriptCacheInterface
{
    protected $connection;

    const ADBACK_ANALYTICS_SCRIPT = 'adback_analytics_script';
    const ADBACK_ANALYTICS_URL = 'adback_analytics_url';
    const ADBACK_MESSAGE_SCRIPT = 'adback_message_script';
    const ADBACK_MESSAGE_URL = 'adback_message_url';
    const ADBACK_AUTOPROMO_BANNER_SCRIPT = 'adback_autopromo_banner_script';
    const ADBACK_AUTOPROMO_BANNER_URL = 'adback_autopromo_banner_url';
    const ADBACK_PRODUCT_SCRIPT = 'adback_product_script';
    const ADBACK_PRODUCT_URL = 'adback_product_url';

    /**
     * @param mixed $connection Mysqli Connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

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
     * @return bool
     */
    public function isMessageConfigured()
    {
        return null != $this->get(self::ADBACK_MESSAGE_SCRIPT);
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
     * Clear analytics data
     */
    public function clearAnalyticsData()
    {
        $this->clear(self::ADBACK_ANALYTICS_SCRIPT);
        $this->clear(self::ADBACK_ANALYTICS_URL);
    }

    /**
     * Clear message data
     */
    public function clearMessageData()
    {
        $this->clear(self::ADBACK_MESSAGE_SCRIPT);
        $this->clear(self::ADBACK_MESSAGE_URL);
    }

    /**
     * Clear autopromo banner data
     */
    public function clearAutopromoBannerData()
    {
        $this->clear(self::ADBACK_AUTOPROMO_BANNER_SCRIPT);
        $this->clear(self::ADBACK_AUTOPROMO_BANNER_URL);
    }

    /**
     * Clear autopromo banner data
     */
    public function clearProductData()
    {
        $this->clear(self::ADBACK_PRODUCT_SCRIPT);
        $this->clear(self::ADBACK_PRODUCT_URL);
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    protected function get($key)
    {
        $value = null;
        $request = $this->connection->prepare('SELECT our_value FROM adback_cache_table WHERE our_key = ? LIMIT 1');
        $request->bind_param('s', $key);

        $request->execute();
        $request->bind_result($value);
        $request->fetch();
        $request->free_result();

        return $value;
    }

    /**
     * @param string $key
     * @param string $value
     */
    protected function set($key, $value)
    {
        $this->clear($key);
        $request = $this->connection->prepare("INSERT INTO adback_cache_table (our_key, our_value) VALUES (?, ?)");
        $request->bind_param('ss', $key, $value);
        $request->execute();
    }

    /**
     * @param string $key
     */
    protected function clear($key)
    {
        $request = $this->connection->prepare("DELETE FROM adback_cache_table WHERE our_key = ?");
        $request->bind_param('s', $key);
        $request->execute();
    }
}
