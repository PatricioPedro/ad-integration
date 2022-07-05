<?php


namespace App\Application\User;

use App\Http\Interfaces\User\IUserBytesHours;
use App\Exceptions\InvalidIntervalDateException;
use App\Exceptions\InverseIntervalDateException;

class UserBytesHours implements IUserBytesHours
{

  function getByteHours(int $startTime, int $endTime, int $startDayWeek, int $endDayWeekend): array
  {
    $logon_hours = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    if ($startDayWeek >= $endDayWeekend || $startTime >= $endTime) {
      throw new InverseIntervalDateException;
    }

    if (($startTime < 0 || $endTime > 23) || ($startDayWeek < 1 || $endDayWeekend > 7 ) ) {
      
      throw new InvalidIntervalDateException;
    }
    
    $aux = '000000000000000000000000';

    for ($i = $startTime + 3; $i <= $endTime + 2; $i++) {
      $aux[$i] = '1';
    }

    $firsOctect = strrev(mb_substr($aux, 0, 8));
    $secondOctect = strrev(mb_substr($aux, 8, 8));
    $thirdOctect = strrev(mb_substr($aux, 16, 8));

    $bytes = array(
      0 => bindec($firsOctect),
      1 => bindec($secondOctect),
      2 => bindec($thirdOctect),
    );

    $i = 0;

    while ($i < 21) {

      if ($i >= ($startDayWeek - 1) * 3  && $i <= ($endDayWeekend - 1) * 3) {
        for ($j = 0; $j < 3; $j++) {
          $logon_hours[$i] = $bytes[$j];
          $i++;
        }
      } else {
        $i += 3;
      }
    }

    return $logon_hours;
  }
}
