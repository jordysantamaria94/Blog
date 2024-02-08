<?php 

use Carbon\Carbon;

function formatDateCard($date) 
{
    $day = Carbon::parse($date)->locale('es')->isoFormat('D');
    $month = Carbon::parse($date)->locale('es')->isoFormat('MMMM');
    $year = Carbon::parse($date)->locale('es')->isoFormat('YYYY');

    return "{$day} de {$month} de {$year}";
}