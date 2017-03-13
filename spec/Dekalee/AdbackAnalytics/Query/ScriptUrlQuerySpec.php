<?php

namespace spec\Dekalee\AdbackAnalytics\Query;

use Dekalee\AdbackAnalytics\Client\Client;
use Dekalee\AdbackAnalytics\Client\Response;
use Dekalee\AdbackAnalytics\Driver\ScriptCacheInterface;
use Dekalee\AdbackAnalytics\Query\ScriptUrlQuery;
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

    function it_should_call_script_api_and_store_answer(
        Client $client,
        ScriptCacheInterface $cache,
        Response $response
    ) {
        $client->get('https://adback.co/api/script/me?_format=json&access_token=' . $this->token)->willReturn($response);
        $response->getBody()->willReturn(json_encode([
            'analytics_domain' => 'analytics_domain',
            'analytics_script' => 'analytics_script',
            'message_domain' => 'message_domain',
            'message_script' => 'message_script',
        ]));
        $response->getStatusCode()->willReturn(200);

        $cache->setAnalyticsUrl('analytics_domain')->shouldBeCalled();
        $cache->setAnalyticsScript('analytics_script')->shouldBeCalled();
        $cache->setMessageUrl('message_domain')->shouldBeCalled();
        $cache->setMessageScript('message_script')->shouldBeCalled();

        $this->execute();
    }

    function it_should_call_script_api_and_store_message_and_clear_analytics(
        Client $client,
        ScriptCacheInterface $cache,
        Response $response
    ) {
        $client->get('https://adback.co/api/script/me?_format=json&access_token=' . $this->token)->willReturn($response);
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

        $this->execute();
    }

    function it_should_call_script_api_and_store_analytics_and_clear_messages(
        Client $client,
        ScriptCacheInterface $cache,
        Response $response
    ) {
        $client->get('https://adback.co/api/script/me?_format=json&access_token=' . $this->token)->willReturn($response);
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

        $this->execute();
    }

    function it_should_call_script_api_and_not_store_answer_if_there_is_an_error(
        Client $client,
        ScriptCacheInterface $cache,
        Response $response
    ) {
        $client->get('https://adback.co/api/script/me?_format=json&access_token=' . $this->token)->willReturn($response);
        $response->getStatusCode()->willReturn(201);

        $cache->setAnalyticsUrl(Argument::any())->shouldNotBeCalled();
        $cache->setAnalyticsScript(Argument::any())->shouldNotBeCalled();
        $cache->setMessageUrl(Argument::any())->shouldNotBeCalled();
        $cache->setMessageScript(Argument::any())->shouldNotBeCalled();

        $this->execute();
    }
}
