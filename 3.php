<?php

require_once('ArrayGenerator.php');
require_once('ArrayFields.php');

/**
 * вернуть из массива только элементы, удовлетворяющие внешним условиям
 * (например элементы с определенным id)
 */

$array = (new ArrayGenerator())->getArray();
$field = ArrayFields::id->value;
$fieldValue = 4;
$resultArray = array_intersect_key($array, array_flip(array_keys(array_column($array, $field), $fieldValue)));