<?php

$steps = [
    "Клубнику блендерим.",
    "В стакан — лёд, 3 дольки лимона, пюре.",
    "Доливаем газировку,подсластитель",
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


