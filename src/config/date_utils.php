<?php

function getDateAsDateTime($date) {
    return is_string($date) ? new DateTime($date) : $date;
}

function isWeekend($date) {
    $inputDate = getDateAsDateTime($date);
    return $inputDate->format('N') >= 6; //se o N (que é o numero do dia) for maior ou igual a 6 significa que é sábado ou domingo
}

function isBefore($date1, $date2) {
    $inputDate1 = getDateAsDateTime($date1);
    $inputDate2 = getDateAsDateTime($date2);
    return $inputDate1 <= $inputDate2;
}

function getNextDay($date){
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify('+1 day');
    return $inputDate;
}

function sumIntervals($interval1, $interval2) {
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->add($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function subtractIntervals($interval1, $interval2) {
    $date = new DateTime('00:00:00');
    $date->add($interval1);
    $date->sub($interval2);
    return (new DateTime('00:00:00'))->diff($date);
}

function getDateFromInterval($interval){
    return new DateTime($interval->format('%H:%i:%s'));
}

function getDateFromString($str) {
    return DateTime::createFromFormat('H:i:s', $str);
}