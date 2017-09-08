<?php

namespace Adback\ApiClient\Query;

use Adback\ApiClient\Client\Client;
use Adback\ApiClient\Driver\ScriptCacheInterface;

/**
 * Class ScriptUrlQuery
 */
class ScriptUrlQuery implements QueryInterface
{
    protected $cache;
    protected $token;
    protected $apiUrl;
    protected $client;
    protected $scriptUrl;

    /**
     * @param Client               $client
     * @param ScriptCacheInterface $cache
     * @param string               $token
     * @param string               $apiUrl
     * @param string               $scriptUrl
     */
    public function __construct(Client $client, ScriptCacheInterface $cache, $token, $apiUrl = 'https://www.adback.co/api', $scriptUrl = 'script/me')
    {
        $this->cache = $cache;
        $this->token = $token;
        $this->apiUrl = $apiUrl;
        $this->client = $client;
        $this->scriptUrl = $scriptUrl;
    }

    /**
     * Get the script info and store them
     */
    public function execute()
    {
        $url = sprintf('%s/%s?_format=json&access_token=%s',
            $this->apiUrl,
            $this->scriptUrl,
            $this->token
        );

        $response = $this->client->get($url);

        if (200 !== $response->getStatusCode()) {
            return;
        }

        $scriptUrlFacade = json_decode($response->getBody(), true);

        if (array_key_exists('analytics_domain', $scriptUrlFacade) && null != $scriptUrlFacade['analytics_domain']) {
            $this->cache->setAnalyticsUrl($scriptUrlFacade['analytics_domain']);
            $this->cache->setAnalyticsScript($scriptUrlFacade['analytics_script']);
        } else {
            $this->cache->clearAnalyticsData();
        }

        if (array_key_exists('message_script', $scriptUrlFacade) && null != $scriptUrlFacade['message_script']) {
            $this->cache->setMessageUrl($scriptUrlFacade['message_domain']);
            $this->cache->setMessageScript($scriptUrlFacade['message_script']);
        } else {
            $this->cache->clearMessageData();
        }

        if (array_key_exists('autopromo_banner_script', $scriptUrlFacade) && null != $scriptUrlFacade['autopromo_banner_script']) {
            $this->cache->setAutopromoBannerUrl($scriptUrlFacade['autopromo_banner_domain']);
            $this->cache->setAutopromoBannerScript($scriptUrlFacade['autopromo_banner_script']);
        } else {
            $this->cache->clearAutopromoBannerData();
        }

        if (array_key_exists('product_script', $scriptUrlFacade) && null != $scriptUrlFacade['product_script']) {
            $this->cache->setProductUrl($scriptUrlFacade['product_domain']);
            $this->cache->setProductScript($scriptUrlFacade['product_script']);
        } else {
            $this->cache->clearProductData();
        }
    }
}
