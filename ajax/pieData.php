<?php
require '..\funktsioonid\dbfun.php';

$data = getPie();

$newData = array_map(function($el) {
    return [
    'value' => 5,
    'label' => 'ErakonnaNimi',
    'color' => '#FA58F4'
    ];
}, $data);

echo json_encode($newData);
?>