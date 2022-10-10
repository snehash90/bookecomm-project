<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminData = User::find(1);
        return view('admin.admin_profile_view', compact('adminData'));
    } // end Method

    public function AdminEditProfile()
    {
        $editData = User::find(1);
        return view('admin.admin_profile_edit', compact('editData'));
    } //end method

    public function AdminProfileStore(Request $request)
    {
        $data = User::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            @unlink(public_path('upload/admin_images/' . $data->profile_image));
            $filename =  date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    } //end method


    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    } //end method

    public function AdminUpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = User::find(1)->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = User::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    } // end method
}