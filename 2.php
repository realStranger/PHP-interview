<?php

require_once('ArrayGenerator.php');
require_once('ArrayFields.php');

/**
 * отсортировать многомерный массив по ключу (любому)
 */

$array = (new ArrayGenerator())->getArray();
$field = ArrayFields::id->value;

usort($array, function ($a, $b) use ($field) {
    return $a[$field] <=> $b[$field];
});

