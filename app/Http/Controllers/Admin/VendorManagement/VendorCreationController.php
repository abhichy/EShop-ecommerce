<?php

namespace App\Http\Controllers\Admin\VendorManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Vendor\VendorAuth;
use Illuminate\Support\Facades\Hash;

class VendorCreationController extends Controller
{
    public function vendor_create()
    {
        return view('Admin.Vendormanage.vendor_creation');
    }

    public function save_update(Request $request)
    {
        $request->validate([
            'vendor_name' => 'required|max:8|min:2,'
        ]);

        if (!empty($request->id)) {
            VendorAuth::find($request->id)->update($request->all());
            $message = "Vendor Updated Successfully!!";
        } else {

            $image     = $request->file('photo');
            $imageName = $image->getClientOriginalName();
            $directory = 'public/vendor_photo/';
            $image->move($directory, $imageName);
            $save = new VendorAuth;
            $save->vendor_name     = $request->vendor_name;
            $save->password         = Hash::make($request->password);
            $save->email      = $request->email;
            $save->phone     = $request->phone;
            $save->location     = $request->location;
            $save->phone     = $request->phone;
            $save->photo         = $directory . $imageName;
            $save->save();
            $message = "Vendor Created Successfully!!";
        }

        return redirect()->route('vendor-manage')->with([
            'message' => $message
        ]);
    }


    public function edit($id)
    {
        $vendor = VendorAuth::find($id);
        return view('Admin.VendorManage.vendor_edit', [
            'vendor' => $vendor
        ]);
    }
}
