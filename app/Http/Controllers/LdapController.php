<?php

namespace App\Http\Controllers;

use Adldap\Laravel\Facades\Adldap;

use Illuminate\Http\Request;

class LdapController extends Controller
{
    public function hour_bin($hora_inicial,$hora_final,$semana_inicial,$semana_final){

        $logon_hours = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
     
        $aux = '000000000000000000000000';
     
        for ($i=$hora_inicial-1;$i<$hora_final;$i++){
     
           $aux[$i]='1';
     
        }
      
        $first_array = bindec(mb_substr($aux,0,8));
        $second_array = bindec(mb_substr($aux,8,16));
        $third_array = bindec(mb_substr($aux,16,24));
     
        echo  mb_substr($aux,0,8). " ";
        echo mb_substr($aux,8,8)." ";
        echo  mb_substr($aux,16,8)." ";
       
     
     
     
     
        for ($i=$semana_inicial-1;$i<18;$i+=3){
     
           $logon_hours[$i]=$first_array;
           $logon_hours[$i+1]=$second_array;
           $logon_hours[$i+2]=$third_array;
     
        
     
     
        }
     
        return $logon_hours;
     }
     
     
     
     
     
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = Adldap::search()->where('cn', '=', 'John Doe')->get();

        // // Creating a user:
        // $user = Adldap::make()->user([
        //     'cn' => 'John Doe',
        // ]);


        // //  $search = Adldap::search()->where('cn', '=', 'Patricio Wilder Barros Pedro')->get("logonhours");

        // $binary = base64_decode("AAAAAgYA3ncsRjy9");
        // $binary = substr($binary, 6);
        // // var_dump(unpack("n*", $binary));


        // $powershell = shell_exec("powershell.exe -ExecutionPolicy Bypass -NoProfile -Command 'hello powershell'");

        // $user->logonHours = "sjks";

        // // Saving a user:
        // $user->save();



        return response() -> json([
            "user" =>$search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response() -> json([
            "user" => "Ola mundo"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
