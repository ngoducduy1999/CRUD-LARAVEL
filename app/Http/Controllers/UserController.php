<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Lấy người dùng hiện tại
        return view('user.profile', compact('user')); // Trả về view với dữ liệu người dùng
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Lấy người dùng hiện tại

        $request->validate([
            'fullname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:50',
            'state' => 'nullable|string|max:50',
            'zip_code' => 'nullable|string|max:10',
        ]);

        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->zip_code = $request->input('zip_code');

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->save(); // Lưu thay đổi vào cơ sở dữ liệu

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->route('user.profile')->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save(); // Lưu thay đổi vào cơ sở dữ liệu

        return redirect()->route('user.profile')->with('success', 'Password updated successfully.');
    }
}
