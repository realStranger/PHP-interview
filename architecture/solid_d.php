<?php

interface HTTPRequestServiceInterface
{
    public function request();
}

class XMLHTTPRequestService implements HTTPRequestServiceInterface
{
    public function request()
    {
    }
}

class XMLHttpService extends XMLHTTPRequestService
{
    public function request()
    {
        parent::request();
        $requestData = 'blahblah';
    }
}

class Http
{
    private HTTPRequestServiceInterface $service;

    public function __construct(HTTPRequestServiceInterface $xmlHttpService)
    {
        $this->service = $xmlHttpService;
    }

    public function get(string $url, array $options)
    {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url)
    {
        $this->service->request($url, 'GET');
    }
}
