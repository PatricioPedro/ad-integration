<?php
namespace App\Application\User;
use App\Http\Interfaces\User\IUserLogonHourFormat;

class UserLongonHoursFormat implements IUserLogonHourFormat {
    function getFormat(array $bytes): string
    {
        $logonHoursString = array_map("chr", $bytes);
        $logonHoursString = implode("", $logonHoursString);
        return $logonHoursString;
    }
}
