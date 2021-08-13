<?php

session_start();
requireValidSession();

$currentDate = new DateTime();

$user = $_SESSION['user'];

$selectedPeriod = $_POST['period'] ? $_POST['period'] : $currentDate->format('Y-m');
$periods = [];

for($yearDiff = 2; $yearDiff >= 0; $yearDiff--) {
    $year = date('Y') - $yearDiff;
    for($month = 1; $month <= 12; $month++) {
        $date = new DateTime("{$year}-{$month}-1");
        $periods[$date->format('Y-m')] = strftime('%B de %Y', $date->getTimestamp());
    }
}

$registries = WorkingHours::getMonthlyReport($user->id, $currentDate);

$report = [];
$workday = 0;
$sumofWorkedTime = 0;
$lastday = getLastDayOfMonth($selectedPeriod)->format('d');

for ($day = 1; $day <= $lastday; $day++) {
    $date = $selectedPeriod->format('Y-m') . '-' . sprintf('%02d', $day);
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
    'sumOfWorkedTime' => getTimeStringFromSeconds($sumofWorkedTime),
    'balance' => "{$sign}{$balance}",
    'periods' => $periods
]);