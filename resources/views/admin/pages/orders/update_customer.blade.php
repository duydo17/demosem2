@extends('admin.layouts.layout')
@section('content')


<style>
    label {
        margin-right: 10px;
        width: 170px;
        font-weight: bold;
    }

    .text-danger {
        color: red;
    }
</style>
<div id="content" class="fl-right">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Sửa Thông Tin Thành Viên</h3>
        </div>
    </div>
    <div class="section" id="detail-page">
        <div class="section-detail">
            <form action="{{route('edit.customer',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="width: 500px; display: flex;">
                    <label for="fullname">Họ Và Tên:</label>
                    <input style="flex: 1;" type="text" value="{{$user->fullname}}" name="fullname" id="fullname">
                </div>
                @error('fullname')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="username">Tên Đăng Nhập:</label>
                    <input style="flex: 1;" type="text" name="username" value="{{$user->username}}" disabled id="username">
                </div>
                @error('username')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="email">Email: </label>
                    <input style="flex: 1;" type="text" name="email" value="{{$user->email}}" disabled  id="email">
                </div>
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="password">Mật Khẩu:</label>
                    <input style="flex: 1;" type="password" value="{{$user->password}}" name="password" id="password">
                </div>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="address">Địa Chỉ:</label>
                    <input style="flex: 1;" type="text" value="{{$user->address}}" name="address" id="address">
                </div>
                @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="phone">Số Điện Thoại:</label>
                    <input style="flex: 1;" type="text" value="{{$user->phone}}" name="phone" id="phone">
                </div>
                @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="gender">Giới Tính: </label>
                    <div class="gender">
                        <input type="radio" id="male" name="gender" value="Male" {{ old('gender', $user->gender) === 'Male' ? 'checked' : '' }}>
                        <label for="male">Nam</label>
                        <input type="radio" id="female" name="gender" value="Female" {{ old('gender', $user->gender) === 'Female' ? 'checked' : '' }}>
                        <label for="female">Nữ</label>
                    </div>
                </div>
                @error('gender')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>

                <div style="width: 500px; display: flex;">
                    <label>Chức Vụ</label>
                    <select name="role" id="role">
                        <option value="">-- Chọn danh mục --</option>
                        <option value="user" {{old('role',$user->role)== 'user' ? 'selected' : ''}}>Thành Viên</option>
                        <option value="admin" {{old('role',$user->role)== 'admin' ? 'selected' : ''}}>Quản Lý</option>
                        <option value="shipper" {{old('role',$user->role)== 'shipper' ? 'selected' : ''}}>Nhân Viên Giao Hàng</option>

                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success" style="color: white;" name="btn-submit" id="btn-submit">Sửa Thành Viên</button>
            </form>
        </div>
    </div>
</div>
@stop