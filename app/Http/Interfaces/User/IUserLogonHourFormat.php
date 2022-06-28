<?php


namespace App\Http\Interfaces\User;

interface IUserLogonHourFormat {
    function getFormat (int $startTime, int $endTime, int $startDayWeek, int $endDayWeekend);
}

