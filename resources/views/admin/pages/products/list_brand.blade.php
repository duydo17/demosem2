@extends('admin.layouts.layout')
@section('content')
<div id="content" class="fl-right">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Danh sách Thương Hiệu</h3>
            <a href="{{route('create.brand')}}" title="" id="add-new" class="fl-left">Thêm Thương Hiệu Mới</a>
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
                            <td><span class="thead-text">Tên Thương Hiệu</span></td>
                            <td><span class="thead-text">Người tạo</span></td>
                            <td><span class="thead-text">Thời gian</span></td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $stt=1
                        @endphp
                        @foreach($brands as $brand)
                        <tr>

                            <td><span class="tbody-text">{{$stt++}}</h3></span>
                            <td class="clearfix">
                                <div class="tb-title fl-left">
                                    <p>{{$brand->name}}</p>
                                </div>
                                <ul class="list-operation fl-right">

                                    <li><a href="{{route('delete.brand',$brand->id)}}"onclick="return confirm('bạn muốn xóa thương hiệu này?')" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                </ul>
                            </td>
                            @foreach($users as $user)
                            @if($user->id == $brand->user_id)
                            <td><span class="tbody-text">{{$user->username}}</span></td>
                            @endif
                            @endforeach
                            <td><span class="tbody-text">{{$brand->created_at}}</span></td>

                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="section" id="paging-wp">
        <div class="section-detail clearfix">
           
            <ul id="list-paging" class="fl-right">
                {{ $brands->links() }}
            </ul>
        </div>
    </div>
</div>
@stop