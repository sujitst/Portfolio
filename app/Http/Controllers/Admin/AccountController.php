<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class AccountController extends Controller
{
    public function account() {
        $user = User::where('utype', 'adm')->first();
        return view('admin.account.index', compact('user'));
    }


    //=====|| UPDATE THE RESOURCE
    public function accountupdate(Request $request, $id) {
        $request->validate([
            'name'     => 'nullable|string|max:255',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
            'city'     => 'nullable|string|max:100',
            'country'  => 'nullable|string|max:100',
            'zip_code' => 'nullable|numeric',
            'photo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'    => 'nullable|email|max:255|unique:users,email,'.$id,
            'dob'      => 'nullable|date',
        ]);

        $user = User::where('utype', 'adm')->where('id', $id)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $imageName = $user->photo;

        if ($request->hasFile('photo')) {
            if ($imageName && file_exists(public_path('upload/my_account/' . $imageName))) {
                unlink(public_path('upload/my_account/' . $imageName));
            }
            $photo = $request->file('photo');
            $imageName = time() . '-' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('upload/my_account/'), $imageName);
        }

        $user->update([
            'name'     => $request->input('name'),
            'phone'    => $request->input('phone'),
            'address'  => $request->input('address'),
            'city'     => $request->input('city'),
            'country'  => $request->input('country'),
            'zip_code' => $request->input('zip_code'),
            'photo'    => $imageName, 
            'email'    => $request->input('email'),
            'dob'      => $request->input('dob'),
        ]);

        return redirect()->route('admin.account')->with('success', 'Account updated successfully.');
    }




    //=====|| SHOW CHANGE PASSWORD FORM
    public function showChangePassword() {
        return view('admin.account.change_password');
    }



    //=====|| CHANGE PASSWORD
    public function changePassword(Request $request) {
        $request->validate([
            'current_password'  => 'required',
            'password'          => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if(!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.account')->with('success', 'Password changed successfully!');
    }
}
