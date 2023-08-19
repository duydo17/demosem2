@extends('users.layouts.layout')
@section('content')
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">

            </div>
        </div>
       

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Lỗi!</strong>{{session('error')}}
        </div>
        @endif
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Đổi Mật Khẩu</h3>
                </div>
                <div class="section-detail">
                    <form action="{{route('resetpassword',$user->id)}}" method="Post">
                        @csrf
                       
                       
                        <label for="password"><b>Mật Khẩu Mới</b></label>
                        <input type="password" class="input_text" placeholder="Nhập Mật Khẩu Mới" name="password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label for="password_confirmation"><b>Xác Nhận Mật Khẩu</b></label>
                        <input type="password" class="input_text" placeholder="Xác Nhận Mật Khẩu" name="password_confirmation">
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>


                        <button type="submit" class="button_login">Đổi Mật Khẩu</button>
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

    form {
        width: 100%;
    }

    input {
        width: 100%;
        margin-bottom: 20px;
        height: 40px;
        font-size: 30px;
        font-weight: bold;
        color: black;
    }
</style>
@stop