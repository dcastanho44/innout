<?php
session_start();
requireValidSession();    //só vai continuar caso exista uma sessão válida
loadTemplateView('day_records');