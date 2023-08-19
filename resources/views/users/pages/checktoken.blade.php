@extends('users.layouts.layout')
@section('content')
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">

            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp" style="min-height: 268px;">
                <div class="section-head clearfix">
                    <h3 class="section-title">Quên Mật Khẩu</h3>
                </div>
                <div class="section-detail">
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Lỗi!</strong>{{session('error')}}
                    </div>
                    @endif
                    <form action="{{route('email.checktoken')}}" method="Post">
                        @csrf
                        <label for="otp"><b>Mã OTP:</b></label>
                        <input type="text" class="input_text" style="font-size: 20px;" placeholder="Nhập mã OTP" name="otp">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <button type="submit" class="button_login">Xác Nhận Mã OTP</button>
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