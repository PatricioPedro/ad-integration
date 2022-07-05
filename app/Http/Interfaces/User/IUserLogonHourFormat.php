<?php


namespace App\Http\Interfaces\User;

interface IUserLogonHourFormat {
    function getFormat (array $bytes):string;
}

