<?php

namespace App\Http\Controllers;
use Adldap\AdldapInterface;


use App\Http\Interfaces\User\IUserLogonHourFormat;

use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $ldap;
    private $formatHour;

    public function __construct(AdldapInterface $ldap, IUserLogonHourFormat $formatHour)
    {
        $this->ldap = $ldap;
        $this -> formatHour = $formatHour;
    }

    public function updateUserLogonsHours (Request $request) {

         $user = $this->ldap->search()->users()->find($request -> user);

        $formatlogonhours = $this -> formatHour -> getFormat(8, 18, 1, 7);
         $user -> logonhours = $formatlogonhours;
          $user -> save();

         return response() -> json([
            "user" => $user
         ]);

    

      
         
    }


}
