<?php

namespace App\Http\Controllers;


use App\Http\Interfaces\User\IUserLogonHourFormat;
use App\Http\Interfaces\User\IUserBytesHours;
use App\Http\Interfaces\User\IUserLdap;
use App\Exceptions\InvalidIntervalDateException;
use App\Exceptions\InverseIntervalDateException;
use App\Exceptions\UserLDAPNotFoundException;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $logonhours;
    private $bytesHours;
    private $userLdap;

    public function __construct(
        IUserBytesHours $bytesHours,
        IUserLogonHourFormat $format,
        IUserLdap $userLdap
    ) {
        $this->bytesHours = $bytesHours;
        $this->logonhours = $format;
        $this->userLdap = $userLdap;
    }


    public function updateUserLogonsHours(Request $request)
    {
        try {

            $user =  $this->userLdap->search($request->user);

            $bytesHours = $this->bytesHours->getByteHours(
                $request->startTime,
                $request->endTime,
                $request->startWeek,
                $request->endWeek
            );

            $newLogonHours = $user->logonhours;
            $newLogonHours[0] =  $this->logonhours->getFormat($bytesHours);;

            $user->logonhours = $newLogonHours;

            $this->userLdap->save($user);

            return response()->json([
                "success" => true,
                "message" => "Horas de logon do usuário $request->user alterado com sucesso!"
            ]);
        } catch (UserLDAPNotFoundException $ex) {
            return response()->json([
                "success" => false,
                "error" => [
                    "type_error" => $ex,
                    "message" => "Usuário ldap não encontrado, é necessário um samaaccountname válido."
                ]
            ]);
        } catch (InvalidIntervalDateException $ex) {
            return response()->json([
                "success" => false,
                "error" => [
                    "type_error" => $ex,
                    "message" => "Horário deve ser um inteiro compreendido entre 0 e 24, e o da semana entre 1 e 7"
                ]
            ]);
        } catch (InverseIntervalDateException $ex) {
            return response()->json([
                "success" => false,
                "error" => [
                    "type_error" => $ex,
                    "message" => "A hora inicial deve ser menor que a hora final, e o inicio de semana deve ser menor que o final de semana"
                ]
            ]);
        }
    }
}
