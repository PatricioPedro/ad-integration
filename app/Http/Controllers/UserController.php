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

        return response() -> json([
            "user" =>$user,
            "sucess" => true
        ]);
    }


}
