<?php

namespace App\Respoitories;


use GuzzleHttp\Client;
use function PHPSTORM_META\map;

class WebRequest
{
    protected $baseUrl;
    protected $options;

    public static function getJson($baseUrl, $options)
    {
        $s = new self($baseUrl, $options);
        return $s->json();
    }

    public function __construct($baseUrl, $options)
    {
        $this->baseUrl = $baseUrl;
        $this->options = $options;

        $this->options['key'] = config('maps.key');
    }


    public function json()
    {
        $url = $this->baseUrl . '?' . http_build_query($this->options);

        $client = new Client();
        $data = $client->get($url);
        $parsed = json_decode($data->getBody()->getContents());

        return $parsed;
    }
}