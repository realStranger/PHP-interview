<?php

require_once('ArrayGenerator.php');

/**
 * выделить уникальные записи (убрать дубли) в отдельный массив.
 * в конечном массиве не должно быть элементов с одинаковым id.
 */

$array = (new ArrayGenerator())->getArray();
$resultArray = array_intersect_key($array, array_unique(array_column($array, 'id')));