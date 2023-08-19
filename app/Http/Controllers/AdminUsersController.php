<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\member;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Aler;
use Illuminate\Support\Facades\Mail;
use App\Mail\resetPassword;
class AdminUsersController extends Controller
{
    function index()
    {
        return view('admin.pages.adminusers.login');
    }
    function logout()
    {
        session()->forget('id');
        session()->forget('username');
        session()->forget('role');
        return redirect()->route('home');
    }
    function forgotpassword()
    {
        return view('users.pages.forgotpassword');
    }
    function forgot(Request $request)
    {
        
        $request->validate(
            [
                'email' => 'required|email',
            ],[
                'required' => ':attribute không được để trống',
                'email' => 'Không đúng định dạng email',
            ],[
                'email' => 'email',
            ]);
        $email = $request->input('email');       
        $user = Member::where('email', $email)->first();      
      
        if ($user) {
            $token = Str::random(10);// tạo mã token       
            $expiresAt = now()->addHours(1);     
            Member::where('email', $email)
        ->update([
            'reset_token' => $token,
            'reset_token_expires_at' => $expiresAt,         
        ]);
        $subject = "Quên Mật Khẩu";
        $message =  $token;
        $request->session()->put('email',$user);
        $request->session()->put('tokenreset',$token);
        Mail::to($email)->send(new resetPassword($subject, $message));
        return view('users.pages.checktoken');
        
        }
       return redirect()->back()->with('error', 'Email Không tồn tại');
    }
    function checktoken(Request $request){
       $id = session()->get('email');
       $user = Member::find($id);
        $token = session()->get('tokenreset');      
        
           if($request->input('otp') != $token ){
            return redirect()->route('home')->with('error','Mã OTP Không Chính Xác');            
           }
      
        return view('users.pages.reset',compact('user'));
    }
   function resetpassword(Request $request,$id){
    $request->validate(
        [
           
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',

        ],
        [
            'required' =>  ':attribute không được bỏ trống',
            'confirmed' =>  'Xác Nhận Mật Khẩu Không Trùng Khớp',
        ],
        [
           
            'password' => 'Mật Khẩu Mới',
            'password_confirmation' => 'Xác Nhận Mật Khẩu',
        ]
    );
   
     $user = Member::find($id);
    $user->update([
        'password' => $request->input('password'),
        'reset_token' => "",
        'reset_token_expires_at' => "",   
    ]);
    session()->forget('email');
    session()->forget('tokenreset');
    return redirect()->route('home')->with('success','Đổi mật khẩu thành công!');
   }
    function signup(Request $request)
    {
        $request->validate(
            [
                'fullname' => 'required|',
                'email' => 'required|email|unique:members',
                'address' => 'required',
                'phone' => 'required|numeric|digits:10',
                'username' => 'required|unique:members',
                'gender' => 'required',
                'password' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
                'numeric' => ':arttribute phải là số',
                'digits' => ':attribute cần phải có chính xác :digits số',
                'email' => ':arttribute Đã được đăng ký',
                'unique' => ':arttribute Đã dược đăng ký',

            ],
            [
                'fullname' => 'họ và tên',
                'email' => 'email',
                'address' => 'địa chỉ',
                'phone' => 'số điện thoại',
                'username' => 'tên đăng nhập',
                'password' => 'mật khẩu',
                'gender' => 'giới tính',

            ]
        );

        $user = new Member();
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->role = "user";
        $user->save();
        return redirect()->route('home')->with('success', 'Tạo Tài Khoản Thành Công');
    }
    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'required' =>  ':attribute không được bỏ trống',
        ], [
            'username' => 'Tên Đăng Nhập',
            'password' => 'Mật Khẩu',
        ]);
        $username = $request->input('username');
        $password = $request->input('password');
        $user = Member::where('username', $username)->first();
        if ($user) {
            if ($username == ($user->username) && $password == ($user->password) && ($user->role) == "admin") {
                $userid = $user->id;
                $username = $user->username;
                $role = $user->role;
                $request->session()->put('id', $userid);
                $request->session()->put('username', $username);
                $request->session()->put('role', $role);
                return redirect()->route('admin.index');
            } else if ($username == ($user->username) && $password == ($user->password) && ($user->role) == "user") {
                $userid = $user->id;
                $username = $user->username;
                $role = $user->role;
                $request->session()->put('id', $userid);
                $request->session()->put('username', $username);
                $request->session()->put('role', $role);
                return redirect()->route('home');
            } else if ($username == ($user->username) && $password == ($user->password) && ($user->role) == "shipper") {
                $userid = $user->id;
                $username = $user->username;
                $role = $user->role;
                $request->session()->put('id', $userid);
                $request->session()->put('username', $username);
                $request->session()->put('role', $role);
                return redirect()->route('list.shipper');
            }
                
            
        }return redirect()->route('home')->with('error', 'Đăng Nhập Không Thành Công');
    }
}
