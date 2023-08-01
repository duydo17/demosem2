@extends('admin.layouts.layout')

@section('content')
<div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                   
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ và tên</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Địa chỉ</span></td>
                                    <td><span class="thead-text">Đơn hàng</span></td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $t=1
                                @endphp
                                @foreach($customers as $customer)
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text">{{$t++}}</h3></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="" title="">{{$customer->fullname}}</a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    <td><span class="tbody-text">{{$customer->phone}}</span></td>
                                    <td><span class="tbody-text">{{$customer->email}}</span></td>
                                    <td><span class="tbody-text">{{$customer->address}}</span></td>
                                    <td><span class="tbody-text">1</span></td>
                                    
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