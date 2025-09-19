<?php

$steps = [
    "",
];
//℃
$steps = array_map(
    static function ($step) {
        $step = preg_replace('#\n#', ' ', $step);
        $step = str_replace('\n', ' ', $step);
        $step = trim($step);
        $step = trim($step, '.');
        return trim($step);
    },
    array_filter($steps)
);

echo json_encode($steps, JSON_UNESCAPED_UNICODE);


