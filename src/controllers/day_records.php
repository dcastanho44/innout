<?php
session_start();
requireValidSession();    //só vai continuar caso exista uma sessão válida

loadModel('WorkingHours');

$date = (new DateTime())->getTimeStamp();
$today = strftime('%d de %B de %Y', $date);

loadTemplateView('day_records', ['today' => $today]);