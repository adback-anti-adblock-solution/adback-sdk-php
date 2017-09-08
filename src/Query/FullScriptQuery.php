<?php

namespace Adback\ApiClient\Query;

use Adback\ApiClient\Client\Client;
use Adback\ApiClient\Driver\ScriptCacheInterface;

/**
 * Class FullScriptQuery
 */
class FullScriptQuery implements QueryInterface
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
    public function __construct(Client $client, ScriptCacheInterface $cache, $token, $apiUrl = 'https://www.adback.co/api', $scriptUrl = 'script/me/full')
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

        $fullScriptFacade = json_decode($response->getBody(), true);
        $types = [
            'analytics' => 'Analytics',
            'message' => 'Message',
            'product' => 'Product',
            'banner' => 'AutopromoBanner',
            'iab_banner' => 'IabBanner',
        ];

        foreach ($types as $type => $element) {
            if (array_key_exists($type, $fullScriptFacade['script_codes'])) {
                $scriptSetter = 'set' . $element . 'Script';
                $codeSetter = 'set'. $element . 'Code';
                $this->cache->$scriptSetter($fullScriptFacade['script_codes'][$type]['script_name']);
                $this->cache->$codeSetter($fullScriptFacade['script_codes'][$type]['code']);
            } else {
                $clearer = 'clear' . $element . 'Data';
                $this->cache->$clearer();
            }
        }
    }
}
