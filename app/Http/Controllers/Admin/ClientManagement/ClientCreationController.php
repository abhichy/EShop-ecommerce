<?php

namespace App\Http\Controllers\Admin\ClientManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use DB;

class ClientCreationController extends Controller
{
    public function client_create()
    {
        return view('Admin.ClientManage.client_creation');
    }


    public function update(Request $request)
    {
    
        // DB::enableQueryLog();
        // $client = Client::find($request->id);
        // $query = DB::getQueryLog();
        // print_r($query);
        // // $client = Client::find($request->id);
        // // return $client;
        // exit();

        $client = Client::find($request->id);
        $client->full_name         = $request->full_name;
        $client->email             = $request->email;
        $client->contact_no        = $request->contact_no;
        $client->password          = bcrypt($request->password);
        $client->update();

        return redirect()->route('client-manage')->with("message", "Client Updated Successfully!!");
    }


    public function edit($id)
    {
        $client = Client::find($id);
        return view('Admin.ClientManage.client_edit', [
            'client' => $client
        ]);
    }
}
