@extends('users.layouts.layout')
@section('content')
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">

            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Thông Tin Tài Khoản</h3>
                </div>
                <div class="section-detail">
                    <form action="{{route('update.user',$user->id)}}" method="Post">
                        @csrf
                        <label for="fullname"><b>Họ Và Tên</b></label>
                        <input type="text" class="input_text" value="{{$user->fullname}}" name="fullname">
                        @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror                       
                        </br>
                        <label for="email"><b>Email</b></label>
                        <input type="text" class="input_text" value="{{$user->email}}" name="email" disabled>
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>

                        <label for="address"><b>Địa Chỉ</b></label>
                        <input type="text" class="input_text" value="{{$user->address}}" name="address">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label for="phone"><b>Số Điện Thoại</b></label>
                        <input type="text" class="input_text" value="{{$user->phone}}" name="phone">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label for="gioitinh"><b>Giới Tính</b></label>
                        <div class="gender">
                        <input type="radio" id="male" name="gender" value="Male" {{ old('gender', $user->gender) === 'Male' ? 'checked' : '' }}>
                        <label for="male">Nam</label>
                        <input type="radio" id="female" name="gender" value="Female" {{ old('gender', $user->gender) === 'Female' ? 'checked' : '' }}>
                        <label for="female">Nữ</label>
                        </div>
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <button type="submit" class="button_login">Cập Nhật Tài Khoản</button>
                    </form>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">

                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="selling-wp">

                <div class="secion-detail">
                    <ul class="list-item">

                        <li style="border-bottom: 1px solid #eee;">
                            <a href="{{route('change.password',$user->id)}}" style="font-size: 18px; color: #333; " title="">Đổi Mật Khẩu</a>
                        </li>
                        <li style="border-bottom: 1px solid #eee;">
                            <a href="{{route('home')}}" style="font-size: 18px; color: #333; " title="">Thoát</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .list-item li:hover {
        background-color: #dee2e6;
    }
   
</style>
@stop