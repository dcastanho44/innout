<?php
// Controller Temporário

$i1 = DateInterval::createFromDateString('9 hours');
$i2 = DateInterval::createFromDateString('6 hours');

$r1 = subtractIntervals($i1, $i2);

print_r(getDateFromInterval($r1));