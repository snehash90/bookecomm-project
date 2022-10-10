<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class IndexController extends Controller
{
    public function Index()
    {
        return view('frontend.index');
    } //end method

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    } // end method

    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        //   dd($user);
        return view('frontend.profile.user_profile', compact('user'));
    } // end method

    public function UserProfileUpdate(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');
            @unlink(public_path('upload/user_images/' . $data->profile_image));
            $filename =  date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            $data['profile_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.profile')->with($notification);
    } // end method

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    } // end method

    public function UserUpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else {
            return redirect()->back();
        }
    } // end method
}