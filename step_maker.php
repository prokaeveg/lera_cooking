<?php

$steps = [
    "",
];
//℃
$steps = array_map(
    static function ($step) {
        $step = preg_replace('#\n#', ' ', $step);
        $step = str_replace('\n', ' ', $step);
        return trim($step);
    },
    $steps
);

echo json_encode($steps, JSON_UNESCAPED_UNICODE);


