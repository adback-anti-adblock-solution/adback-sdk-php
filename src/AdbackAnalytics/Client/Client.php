<?php

namespace Dekalee\AdbackAnalytics\Client;

/**
 * Class Client
 */
class Client
{
    /**
     * @param $url
     *
     * @return Response
     */
    public function get($url)
    {
        $content = @file_get_contents($url);

        $response = new Response($content);

        return $response;
    }
}
