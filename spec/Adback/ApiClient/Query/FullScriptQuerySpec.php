<?php

namespace spec\Adback\ApiClient\Query;

use Adback\ApiClient\Client\Client;
use Adback\ApiClient\Client\Response;
use Adback\ApiClient\Driver\ScriptCacheInterface;
use Adback\ApiClient\Query\FullScriptQuery;
use Adback\ApiClient\Query\QueryInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FullScriptQuerySpec extends ObjectBehavior
{
    protected  $token = 'token';

    function let(Client $client, ScriptCacheInterface $cache)
    {
        $this->beConstructedWith($client, $cache, $this->token);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FullScriptQuery::CLASS);
    }

    function it_should_be_a_query()
    {
        $this->shouldHaveType(QueryInterface::CLASS);
    }

    function it_should_call_full_script_api_and_store_them(
        Client $client,
        Response $response,
        ScriptCacheInterface $cache
    ) {
        $client->get('https://www.adback.co/api/script/me/full?_format=json&access_token=' . $this->token)->willReturn($response);
        $response->getBody()->willReturn(json_encode([
            'script_codes' => [
                'analytics' => [
                    'script_name' => 'foo',
                    'type' => 'analytics',
                    'code' => 'analyticsCode',
                ],
                'message' => [
                    'script_name' => 'foo',
                    'type' => 'message',
                    'code' => 'messageCode',
                ],
                'banner' => [
                    'script_name' => 'foo',
                    'type' => 'banner',
                    'code' => 'bannerCode',
                ],
                'product' => [
                    'script_name' => 'foo',
                    'type' => 'product',
                    'code' => 'productCode',
                ],
                'catcher' => [
                    'script_name' => 'foo',
                    'type' => 'catcher',
                    'code' => 'catcherCode',
                ],
                'iab_banner' => [
                    'script_name' => 'foo',
                    'type' => 'iab_banner',
                    'code' => 'iab_bannerCode',
                ],
            ]
        ]));
        $response->getStatusCode()->willReturn(200);

        $cache->setAnalyticsCode('analyticsCode')->shouldBeCalled();
        $cache->setAnalyticsScript('foo')->shouldBeCalled();
        $cache->setMessageCode('messageCode')->shouldBeCalled();
        $cache->setMessageScript('foo')->shouldBeCalled();
        $cache->setAutopromoBannerCode('bannerCode')->shouldBeCalled();
        $cache->setAutopromoBannerScript('foo')->shouldBeCalled();
        $cache->setProductCode('productCode')->shouldBeCalled();
        $cache->setProductScript('foo')->shouldBeCalled();
        $cache->setIabBannerCode('iab_bannerCode')->shouldBeCalled();
        $cache->setIabBannerScript('foo')->shouldBeCalled();

        $this->execute();
    }

    function it_should_call_full_script_and_clear_non_responding(
        Client $client,
        Response $response,
        ScriptCacheInterface $cache
    ) {
        $client->get('https://www.adback.co/api/script/me/full?_format=json&access_token=' . $this->token)->willReturn($response);
        $response->getBody()->willReturn(json_encode([
            'script_codes' => []
        ]));
        $response->getStatusCode()->willReturn(200);

        $cache->clearAnalyticsData()->shouldBeCalled();
        $cache->clearMessageData()->shouldBeCalled();
        $cache->clearAutopromoBannerData()->shouldBeCalled();
        $cache->clearProductData()->shouldBeCalled();
        $cache->clearIabBannerData()->shouldBeCalled();

        $this->execute();
    }
}
