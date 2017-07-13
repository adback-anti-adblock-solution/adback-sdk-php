<?php

namespace Adback\ApiClient\Client;

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
        if (function_exists('curl_version')) {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            $data = curl_exec($curl);
            curl_close($curl);
        } else {
            $data = @file_get_contents($url);
        }

        $response = new Response($data);

        return $response;
    }
}
