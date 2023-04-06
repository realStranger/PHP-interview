<?php

/**
 * Второе решение через конфиг и абстрактный класс
 */

/**
 * Глобальный конфиг
 */
$config = [
    'driver' => 'db'
];

class Concept
{
    private \GuzzleHttp\Client $client;
    private Storage $storage;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
        $this->storage = Storage::setdriver();
    }

    public function getUserData()
    {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey()
        ];

        $request = new \Request('GET', 'https://api.method', $params);
        $promise = $this->client->sendAsync($request)->then(function ($response) {
            $result = $response->getBody();
        });

        $promise->wait();
    }

    public function getSecretKey(): string
    {
        return $this->storage->get();
    }
}

abstract class Storage
{
    public static function setDriver(): Storage
    {
        return match (config('storage')) {
            'db' => new Dbstorage(),
            'file' => new FileStorage(),
        };
    }

    abstract public function get(): string;
}

class Dbstorage extends Storage
{
    public function get(): string
    {
    }
}

class FileStorage extends Storage
{
    public function get(): string
    {
    }
}
