<?php

namespace Dekalee\AdbackAnalytics\Query;

use Dekalee\AdbackAnalytics\Driver\ScriptCacheInterface;
use Dekalee\AdbackAnalytics\Facade\ScriptUrlFacade;
use GuzzleHttp\Client;
use JMS\Serializer\SerializerInterface;

/**
 * Class ScriptUrlQuery
 */
class ScriptUrlQuery
{
    protected $cache;
    protected $token;
    protected $apiUrl;
    protected $client;
    protected $scriptUrl;
    protected $serializer;

    /**
     * @param Client               $client
     * @param ScriptCacheInterface $cache
     * @param SerializerInterface  $serializer
     * @param string               $token
     * @param string               $apiUrl
     * @param string               $scriptUrl
     */
    public function __construct(Client $client, ScriptCacheInterface $cache, SerializerInterface $serializer, $token, $apiUrl = 'https://adback.co/api', $scriptUrl = 'script/me')
    {
        $this->cache = $cache;
        $this->token = $token;
        $this->apiUrl = $apiUrl;
        $this->client = $client;
        $this->scriptUrl = $scriptUrl;
        $this->serializer = $serializer;
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

        /** @var ScriptUrlFacade $scriptUrlFacade */
        $scriptUrlFacade = $this->serializer->deserialize($response->getBody(), ScriptUrlFacade::CLASS, 'json');

        if (null != $scriptUrlFacade->analyticsDomain) {
            $this->cache->setAnalyticsUrl($scriptUrlFacade->analyticsDomain);
            $this->cache->setAnalyticsScript($scriptUrlFacade->analyticsScript);
        } else {
            $this->cache->clearAnalyticsData();
        }

        if (null != $scriptUrlFacade->messageDomain) {
            $this->cache->setMessageUrl($scriptUrlFacade->messageDomain);
            $this->cache->setMessageScript($scriptUrlFacade->messageScript);
        } else {
            $this->cache->clearMessageData();
        }
    }
}
