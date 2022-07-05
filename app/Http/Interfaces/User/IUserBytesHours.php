<?php


namespace App\Http\Interfaces\User;

interface IUserBytesHours {
    function getByteHours (int $startTime, int $endTime, int $startDayWeek, int $endDayWeekend):array;
}
