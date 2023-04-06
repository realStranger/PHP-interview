<?php

/**
 * первое решение через Enum и интерфейсы
 */

class Concept
{
    private \GuzzleHttp\Client $client;
    private StorageClass $storage = StorageClass::db;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
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
        return $this->storage->createInstance()->get();
    }
}

interface KeyStorageInterface
{
    public function generate();
}

class DbStorage implements KeyStorageInterface
{
    public function generate()
    {
    }
}

class FileStorage implements KeyStorageInterface
{
    public function generate()
    {
    }
}

enum StorageClass
{
    case file;
    case db;

    public function createInstance(): Storage
    {
        return match ($this) {
            self::file => new DbStorage(),
            self::db => new FileStorage()
        };
    }
}
