<?php

session_start();
requireValidSession();

$currentDate = new DateTime();

$user = $_SESSION['user'];

$registries = WorkingHours::getMonthlyReport($user->id, $currentDate);

$report = [];
$workday = 0;
$sumofWorkedTime = 0;
$lastday = getLastDayOfMonth($currentDate)->format('d');

for ($day = 1; $day <= $lastday; $day++) {
    $date = $currentDate->format('Y-m') . '-' . sprintf('%02d', $day);
    $registry = $registries[$date];

    if(isPastWorkDay($date)) $workDay++;

    if($registry) {
        $sumofWorkedTime += $registry->worked_time;
        array_push($report, $registry);
    } else {
        array_push($report, new WorkingHours([
            'work_date' => $date,
            'worked-time' => 0
        ]));
    }
}

$expectedTime = $workDay * DAILY_TIME;
$balance = getTimeStringFromSeconds(abs($sumofWorkedTime - $expectedTime));
$sign = ($sumofWorkedTime >= $expectedTime) ? '+' : '-';

loadTemplateView('monthly_report', [
    'report' => $report,
    'sumOfWorkedTime' => $sumofWorkedTime,
    'balance' => "{$sign}{$balance}"
]);