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
                            <td><span class="thead-text">Email</span></td>
                            <td><span class="thead-text">Nội Dung</span></td>
                            <td><span class="thead-text">Sản Phẩm</span></td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $stt=1
                        @endphp
                       @foreach($comments as $comment)
                        <tr>

                            <td><span class="tbody-text">{{$stt++}}</h3></span>
                            <td class="clearfix">
                                <div class="tb-title fl-left">
                                    <p>{{$comment->email}}</p>
                                </div>
                                <ul class="list-operation fl-right">

                                    <li><a href="{{route('delete.comment',$comment->id)}}"onclick="return confirm('bạn muốn xóa ý kiến này?')" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                </ul>
                            </td>
                            
                            <td><span class="tbody-text">{{$comment->content}}</span></td>
                            @foreach($products as $product)
                           @if($comment->product_id==$product->id)
                            <td><span class="tbody-text">{{$product->name}}</span></td>
                            @endif
                            @endforeach
                        </tr>
                      @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="section" id="paging-wp">
        <div class="section-detail clearfix">
           
            <ul id="list-paging" class="fl-right">
               
            </ul>
        </div>
    </div>
</div>
@stop