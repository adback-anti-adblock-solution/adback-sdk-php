<?php

namespace spec\Adback\ApiClient\Query;

use Adback\ApiClient\Client\Client;
use Adback\ApiClient\Client\Response;
use Adback\ApiClient\Driver\ScriptCacheInterface;
use Adback\ApiClient\Query\QueryInterface;
use Adback\ApiClient\Query\ScriptUrlQuery;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ScriptUrlQuerySpec extends ObjectBehavior
{
    protected  $token = 'token';

    function let(Client $client, ScriptCacheInterface $cache)
    {
        $this->beConstructedWith($client, $cache, $this->token);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ScriptUrlQuery::CLASS);
    }

    function it_should_be_a_query()
    {
        $this->shouldHaveType(QueryInterface::CLASS);
    }

    function it_should_call_script_api_and_store_answer(
        Client $client,
        ScriptCacheInterface $cache,
        Response $response
    ) {
        $client->get('https://www.adback.co/api/script/me?_format=json&access_token=' . $this->token)->willReturn($response);
        $response->getBody()->willReturn(json_encode([
            'analytics_domain' => 'analytics_domain',
            'analytics_script' => 'analytics_script',
            'message_domain' => 'message_domain',
            'message_script' => 'message_script',
            'autopromo_banner_domain' => 'autopromo_banner_domain',
            'autopromo_banner_script' => 'autopromo_banner_script',
            'product_domain' => 'product_domain',
            'product_script' => 'product_script',
            'iab_banner_domain' => 'iab_banner_domain',
            'iab_banner_script' => 'iab_banner_script',
        ]));
        $response->getStatusCode()->willReturn(200);

        $cache->setAnalyticsUrl('analytics_domain')->shouldBeCalled();
        $cache->setAnalyticsScript('analytics_script')->shouldBeCalled();
        $cache->setMessageUrl('message_domain')->shouldBeCalled();
        $cache->setMessageScript('message_script')->shouldBeCalled();
        $cache->setAutopromoBannerUrl('autopromo_banner_domain')->shouldBeCalled();
        $cache->setAutopromoBannerScript('autopromo_banner_script')->shouldBeCalled();
        $cache->setProductUrl('product_domain')->shouldBeCalled();
        $cache->setProductScript('product_script')->shouldBeCalled();
        $cache->setIabBannerUrl('iab_banner_domain')->shouldBeCalled();
        $cache->setIabBannerScript('iab_banner_script')->shouldBeCalled();

        $this->execute();
    }

    function it_should_call_script_api_and_store_message_and_clear_analytics(
        Client $client,
        ScriptCacheInterface $cache,
        Response $response
    ) {
        $client->get('https://www.adback.co/api/script/me?_format=json&access_token=' . $this->token)->willReturn($response);
        $response->getBody()->willReturn(json_encode([
            'message_domain' => 'message_domain',
            'message_script' => 'message_script',
        ]));
        $response->getStatusCode()->willReturn(200);

        $cache->setAnalyticsUrl(Argument::any())->shouldNotBeCalled();
        $cache->setAnalyticsScript(Argument::any())->shouldNotBeCalled();
        $cache->setMessageUrl('message_domain')->shouldBeCalled();
        $cache->setMessageScript('message_script')->shouldBeCalled();
        $cache->clearAnalyticsData()->shouldBeCalled();
        $cache->clearAutopromoBannerData()->shouldBeCalled();
        $cache->clearProductData()->shouldBeCalled();
        $cache->clearIabBannerData()->shouldBeCalled();

        $this->execute();
    }

    function it_should_call_script_api_and_store_analytics_and_clear_messages(
        Client $client,
        ScriptCacheInterface $cache,
        Response $response
    ) {
        $client->get('https://www.adback.co/api/script/me?_format=json&access_token=' . $this->token)->willReturn($response);
        $response->getBody()->willReturn(json_encode([
            'analytics_domain' => 'analytics_domain',
            'analytics_script' => 'analytics_script',
        ]));
        $response->getStatusCode()->willReturn(200);

        $cache->setAnalyticsUrl('analytics_domain')->shouldBeCalled();
        $cache->setAnalyticsScript('analytics_script')->shouldBeCalled();
        $cache->setMessageUrl(Argument::any())->shouldNotBeCalled();
        $cache->setMessageScript(Argument::any())->shouldNotBeCalled();
        $cache->clearMessageData()->shouldBeCalled();
        $cache->clearAutopromoBannerData()->shouldBeCalled();
        $cache->clearProductData()->shouldBeCalled();
        $cache->clearIabBannerData()->shouldBeCalled();

        $this->execute();
    }

    function it_should_call_script_api_and_not_store_answer_if_there_is_an_error(
        Client $client,
        ScriptCacheInterface $cache,
        Response $response
    ) {
        $client->get('https://www.adback.co/api/script/me?_format=json&access_token=' . $this->token)->willReturn($response);
        $response->getStatusCode()->willReturn(201);

        $cache->setAnalyticsUrl(Argument::any())->shouldNotBeCalled();
        $cache->setAnalyticsScript(Argument::any())->shouldNotBeCalled();
        $cache->setMessageUrl(Argument::any())->shouldNotBeCalled();
        $cache->setMessageScript(Argument::any())->shouldNotBeCalled();
        $cache->setAutopromoBannerUrl(Argument::any())->shouldNotBeCalled();
        $cache->setAutopromoBannerScript(Argument::any())->shouldNotBeCalled();
        $cache->setProductUrl(Argument::any())->shouldNotBeCalled();
        $cache->setProductScript(Argument::any())->shouldNotBeCalled();
        $cache->setIabBannerUrl(Argument::any())->shouldNotBeCalled();
        $cache->setIabBannerScript(Argument::any())->shouldNotBeCalled();

        $this->execute();
    }
}
