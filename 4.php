<?php

require_once('ArrayGenerator.php');
require_once('ArrayFields.php');

/**
 * изменить в массиве значения и ключи (использовать name => id в качестве пары ключ => значение)
 */

$array = (new ArrayGenerator())->getArray();

$firstField = ArrayFields::name->value;
$secondField = ArrayFields::id->value;

$fields = [
    'first' => $firstField,
    'second' => $secondField
];

array_walk($array, function (&$node, $key, $fields) {
    $node = [
        $node[$fields['first']] => $node[$fields['second']]
    ];
}, $fields);
