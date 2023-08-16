@extends('admin.layouts.layout')

@section('content')
<div id="content" class="fl-right">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Danh sách Thành Viên</h3>
        </div>
    </div>
    <div class="section" id="detail-page">
        <div class="section-detail">
            <div class="filter-wp clearfix">

                <form action="#" class="form-s fl-right">
                    <input type="text" name="keyword" id="keyword" value="{{request()->input('keyword')}}">
                    <input type="submit" name="btn_search" value="Tìm kiếm">
                </form>
            </div>

            <div class="table-responsive">
                @if (session('success'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{session('success')}}
                </div>
                @endif
                <table class="table list-table-wp">
                    <thead>
                        <tr>

                            <td><span class="thead-text">STT</span></td>
                            <td><span class="thead-text">Họ và tên</span></td>
                            <td><span class="thead-text">Tên Đăng Nhập</span></td>
                            <td><span class="thead-text">Số điện thoại</span></td>
                            <td><span class="thead-text">Email</span></td>
                            <td><span class="thead-text">Chức Vụ</span></td>
                            <td><span class="thead-text">Địa chỉ</span></td>


                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $t=1

                        @endphp
                        @if(session('id'))
                        @php
                        $id = session('id');
                        @endphp
                        @endif
                        @foreach($customers as $customer)
                        <tr>

                            <td><span class="tbody-text">{{$t++}}</h3></span>
                            <td>
                                <div class="tb-title fl-left">
                                    <a href="" title="">{{$customer->fullname}}</a>
                                </div>

                                <ul class="list-operation fl-right">

                                    <li><a href="{{route('update.customer',$customer->id)}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                    @if($customer->id != $id)
                                    <li><a href="{{route('delete.customer',$customer->id)}}" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                    @endif
                                </ul>
                            </td>
                            <td><span class="tbody-text">{{$customer->username}}</span></td>
                            <td><span class="tbody-text">{{$customer->phone}}</span></td>
                            <td><span class="tbody-text">{{$customer->email}}</span></td>
                            @if($customer->role == "user")
                            <td><span class="tbody-text">Thành Viên</span></td>
                            @endif
                            @if($customer->role == "admin")
                            <td><span class="tbody-text">Quản Lý</span></td>
                            @endif
                            @if($customer->role == "shipper")
                            <td><span class="tbody-text">Nhân Viên Giao Hàng</span></td>
                            @endif
                            <td><span class="tbody-text">{{$customer->address}}</span></td>


                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="section" id="paging-wp">
        <div class="section-detail clearfix">

            <ul id="list-paging" class="fl-right">
                {{$customers->links()}}
            </ul>
        </div>
    </div>
</div>
@stop