@extends('admin.layouts.layout')
@section('content')

<div id="content" class="fl-right">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Danh sách sản phẩm</h3>
            <a href="{{route('create.product')}}" title="" id="add-new" class="fl-left">Thêm Sản Phẩm Mới</a>
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
                            <td><span class="thead-text">Mã sản phẩm</span></td>
                            <td><span class="thead-text">Hình ảnh</span></td>
                            <td><span class="thead-text">Tên sản phẩm</span></td>
                            <td><span class="thead-text">Giá</span></td>
                            <td><span class="thead-text">Danh mục</span></td>
                            <td><span class="thead-text">Thương Hiệu</span></td>
                            <td><span class="thead-text">Tồn Kho</span></td>
                            <td><span class="thead-text">Người tạo</span></td>
                            <td><span class="thead-text">Thời gian</span></td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $stt=1;
                        @endphp
                        @foreach($products as $product)
                        <tr>

                            <td><span class="tbody-text">{{$stt++}}</h3></span>
                            <td><span class="tbody-text">{{$product->code}}</h3></span>
                            <td>
                                <div class="tbody-thumb">
                                    <img src="{{asset($product->product_thumbnail[0]->image)}}" alt="">
                                </div>
                            </td>
                            <td class="clearfix">
                                <div class="tb-title fl-left">
                                    <a href="" title="">{{$product->name}}</a>
                                </div>
                                <ul class="list-operation fl-right">
                                    <li><a href="{{route('update.product',$product->id)}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                    <li><a href="{{route('delete.product',$product->id)}}" onclick="return confirm('bạn muốn xóa sản phẩm này?')" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                </ul>
                            </td>
                            <td><span class="tbody-text">{{number_format($product->price,0,',','.')}}đ</span></td>
                            @foreach($cates as $cate)
                            @if($cate->id ==$product->category_id)
                            <td><span class="tbody-text">{{$cate->name}}</span></td>
                            @endif

                            @endforeach
                            @foreach($brands as $brand)
                            @if($brand->id ==$product->brand_id)
                            <td><span class="tbody-text">{{$brand->name}}</span></td>
                            @endif
                            @endforeach

                            <td><span class="tbody-text" style="color: #4FA327;">{{$product->stock}} Cái</span></td>


                            @foreach($users as $user)
                            @if($user->id == $product->user_id)
                            <td><span class="tbody-text">{{$user->username}}</span></td>
                            @endif

                            @endforeach

                            <td><span class="tbody-text">{{$product->created_at}}</span></td>
                        </tr>
                        @endforeach
                        </tfoot>
                </table>

            </div>
        </div>
    </div>
    </br>
    <div class="section" id="paging-wp">
        <div class="section-detail clearfix">
            <ul id="list-paging" class="fl-right">
                {{ $products->links() }}
            </ul>

        </div>
    </div>
</div>
@stop