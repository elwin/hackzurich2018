<?php

namespace App\Respoitories;


use GuzzleHttp\Client;
use function PHPSTORM_META\map;

class WebRequest
{
    protected $baseUrl;
    protected $options;

    public static function getJson($baseUrl, $options = [])
    {
        $s = new self($baseUrl, $options);
        return $s->get();
    }

    public static function postJson($baseUrl, $options = [])
    {
        $s = new self($baseUrl, $options);
        return $s->post();
    }

    public function __construct($baseUrl, $options)
    {
        $this->baseUrl = $baseUrl;
        $this->options = $options;
    }

    public function post()
    {
        $client = new Client();
        $data = $client->request(
            'POST',
            $this->baseUrl,
            ['form_params' => $this->options]
        );

        return $this->json($data);
    }

    public function get()
    {
        $client = new Client();
        $data = $client->get($this->generateUrl());

        return $this->json($data);
    }


    public function json($data)
    {
        return json_decode($data->getBody()->getContents());
    }

    public function generateUrl()
    {
        return $this->baseUrl . '?' . http_build_query($this->options);
    }
}