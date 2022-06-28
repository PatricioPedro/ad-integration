<?php


namespace App\Application\User;

use App\Http\Interfaces\User\IUserLogonHourFormat;
use App\Exceptions\IntervalHourDayWeekException;

class UserLogonHour implements IUserLogonHourFormat{


  function getFormat(int $startTime, int $endTime, int $startDayWeek, int $endDayWeekend)
  {

        if (!($startTime>=1 && $startTime <= 24) && ($startDayWeek>=1 && $endDayWeekend <= 7)) {
             throw new IntervalHourDayWeekException;
        }
            $logon_hours = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
            
            $aux = '000000000000000000000000';
        
            for ($i=$startTime-1;$i<$endTime;$i++){
        
            $aux[$i]='1';
        
            }
        
            $first_array = bindec(mb_substr($aux,0,8));
            $second_array = bindec(mb_substr($aux,8,16));
            $third_array = bindec(mb_substr($aux,16,24));
        
            echo  mb_substr($aux,0,8). " ";
            echo mb_substr($aux,8,8)." ";
            echo  mb_substr($aux,16,8)." ";
        
            for ($i=$startDayWeek-1;$i<18;$i+=3){
        
            $logon_hours[$i]=$first_array;
            $logon_hours[$i+1]=$second_array;
            $logon_hours[$i+2]=$third_array;
        
            }
        
            return $logon_hours[0];
  }

}