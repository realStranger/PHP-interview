<?php

//По-разному можно понять это задание и сделать разные реализации. Написал так, как понял с первого раза.

class SomeObject
{
    protected $name;

    public function __construct(string $name)
    {
    }

    public function getObjectName()
    {
    }
}

abstract class ObjectsHandler
{
    protected array $objectNames = [];

    public function __construct()
    {
    }

    public function handleObjects(array $objects): array
    {
        $handlers = [];
        foreach ($objects as $object) {
            if (in_array($object->getObjectName(), $this->objectNames)) {
                $handlers[] = 'handle_' . $object->getObjectName();
            }
        }

        return $handlers;
    }
}

class SomeObjectsHandler extends ObjectsHandler
{
    protected array $objectNames = [
        'object_1',
        'object_2'
    ];
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2')
];

$soh = new SomeObjectsHandler();
$soh->handleObjects($objects);