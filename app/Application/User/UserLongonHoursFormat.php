<?php
namespace App\Application\User;
use App\Http\Interfaces\User\IUserLogonHourFormat;

class UserLongonHoursFormat implements IUserLogonHourFormat {
    function getFormat(array $bytes): string
    {
        $strings = array_map("chr", $bytes);
        $string = implode("", $strings);
        return $string;
    }
}
