<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => "Email không được để trống",
            'password.min' => "Tiêu đề phải có ít nhất 8 ký tự",
           
        ]
    );
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Kiểm tra trạng thái kích hoạt của tài khoản
            if (!$user->active) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['email' => 'Your account is not activated yet.']);
            }

            // Chuyển hướng dựa trên vai trò
            if ($user->role == 'admin') {
                return redirect()->route('admin.users');
            }

            // Đăng nhập thành công
            return redirect()->intended('/');
        }

        // Đăng nhập thất bại
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
