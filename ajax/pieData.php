<?php
require '..\funktsioonid\dbfun.php';

$data = getPie();

$newData = array_map(function($el) {
    return [
    'value' => $el['arv'],
    'label' => $el['ErakonnaNimi'],
    'color' => $el['värv']
    ];
}, $data);

echo json_encode($newData);
?>