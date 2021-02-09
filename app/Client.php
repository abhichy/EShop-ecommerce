<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Session;
use Illuminate\Notifications\Notifiable;
class Client extends Model
{   
    use Notifiable;
    protected $guarded = [];

    // public static function register($request){

    //     $client = new Client();
    //     $client->full_name         = $request->full_name;
    //     $client->email             = $request->email;
    //     $client->contact_no        = $request->contact_no;
    //     $client->password          = bcrypt($request->password);


    //     $client->save();
    //     Session::put('client_id',$client->id);
    //     Session::put('client_name',$client->full_name);
    //     Session::put('client_email',$client->email);
    //     Session::put('client_contact_no',$client->contact_no);



    // }

    public static function updateProfile($request){
        $client = Client::find($request->id);
        $client->first_name         = $request->first_name;
        $client->last_name          = $request->last_name;
        $client->email              = $request->email;
        $client->password           = bcrypt($request->password);
        $client->present_address    = $request->present_address;
        $client->permanent_address  = $request->permanent_address;
        $client->nid                = $request->nid;

        $client->save();

        Session::put('client_first_name',$client->first_name);
        Session::put('client_last_name',$client->last_name);
        Session::put('client_email',$client->email);
        Session::put('client_password',$client->password);
        Session::put('client_nid',$client->nid);
        Session::put('client_present_address',$client->present_address);
        Session::put('client_permanent_address',$client->permanent_address);
    }


}
