<?php

class ArrayGenerator
{
    private int $nodes = 5;

    /**
     * @var array{id: int, date: string, name: string}
     */
    private array $array = [];

    public function __construct()
    {
        $this->generate();
    }

    /**
     * @return array{id: int, date: string, name: string}
     */
    public function getArray(): array
    {
        return $this->array;
    }

    private function generate(): void
    {
        for ($i = 1; $i <= $this->nodes; $i++) {
            $randomNumber = rand(1, $this->nodes);
            $this->array[] = [
                'id' => $randomNumber,
                'date' => date("d.m.y", mt_rand(1, time())),
                'name' => 'test' . $randomNumber
            ];
        }
    }
}