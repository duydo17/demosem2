@extends('users.layouts.layout')
@section('content')
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <!-- <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Điện thoại</a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <form action="{{route('add.cart',$product->id)}}" method="post">
                    @csrf
                    <div class="section-detail clearfix">

                        <div class="thumb-wp fl-left">

                            <a href="" title="" id="main-thumb">

                                <img id="zoom" src="{{asset($product->product_thumbnail[0]->image)}}" data-zoom-image="{{asset($product->product_thumbnail[0]->image)}}" />
                            </a>


                            <div id="list-thumb">
                                @foreach($product->product_thumbnail as $thumbnail)
                                <a href="{{asset($thumbnail->image)}}" data-image="{{asset($thumbnail->image)}}" data-zoom-image="{{asset($thumbnail->image)}}">
                                    <img id="zoom" src="{{asset($thumbnail->image)}}" />
                                </a>

                                @endforeach
                            </div>
                        </div>

                        <div class="thumb-respon-wp fl-left">
                            <img src="public/images/img-pro-01.png" alt="">
                        </div>
                        <div class="info fl-right">
                            <h3 class="product-name" style="text-align: center;">{{$product->name}}</h3>
                            <div class="desc">
                                {!! $product->config !!}
                            </div>
                            <div class="num-product">
                                <span class="title">Sản phẩm: </span>
                                @if($product->stock>=1)
                                <span class="status" style="background-color:#008B00 ;color: white; border-radius: 10px;">Còn hàng</span>

                                @else
                                <span class="status" style="background-color: #CD2626 ;color: white; border-radius: 10px;">Hết Hàng</span>

                                @endif

                            </div>

                            <p class="price">Giá: {{number_format($product->price,0,',','.')}}đ</p>

                            <div id="num-order-wp">
                                <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                <input type="text" value="1" name="num-order" id="num-order">
                                <a title="" id="plus"><i class="fa fa-plus"></i></a>
                            </div>


                            @if($product->stock>0)
                            <button class="add-cart" style="border: none; border-radius: 20px;">Thêm giỏ hàng</button>

                            @endif
                        </div>

                    </div>
                </form>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    {!! $product->description !!}
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Nhận Xét</h3>
                </div>
                <div class="section-detail">
                    <p>

                        @foreach($comments as $comment)
                        @php
                        $shouldPrintComment = true; // Biến kiểm tra xem có nên in comment hay không
                        @endphp

                        @foreach($checks as $check)
                        @if (strpos($comment->content, $check->title) !== false)
                        @php
                        $shouldPrintComment = false; // Nếu chứa $check->title thì không in comment
                        @endphp
                        @endif
                        @endforeach

                        @if($shouldPrintComment && $product->id == $comment->product_id)

                    <div style="display: flex; width: 100%; height: auto;">
                        <div style="height: 100%; width: 10%;"> <img src="{{asset('admin/images/img-admin.png')}}" style="color: white; margin-left: 10px; margin-top: 10px; width: 50px;"></div>
                        <div style="height: 100%; width: 80%;">
                            <div style="font-weight: bold; color: blue;">{{$comment->email}}</div>
                            <div style="font-family: Arial, Helvetica, sans-serif;">{{$comment->created_at}}</div>
                            <div>{{$comment->content}}</div>

                        </div>
                    </div>
                    <hr>
                    @endif
                    @endforeach



                    <form method="post" action="{{route('add.comment',$product->id)}}" class="form_cmt" style="margin-top: 20px;">
                        @csrf
                        <div class="mb-3">

                            <label for="cmt" style="font-weight: bold;">Nội Dung:</label>
                            </br>
                            <textarea name="cmt" id="cmt" cols="30" rows="4" style="width:100%"></textarea>

                        </div>

                        <button type="submit" class="btn btn-primary">Thêm Nội Dung</button>
                    </form>
                    </p>
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($products as $pro)
                        @if($product->category_id == $pro->category_id)
                        <li>
                            <a href="" title="" class="thumb">
                                <img src="{{asset($pro->product_thumbnail[0]->image)}}">
                            </a>
                            <a href="" title="" style="min-height: 40px;" class="product-name">{{$pro->name}}</a>
                            <div class="price">
                                <span class="new">Giá: {{number_format($pro->price,0,',','.')}}đ</span>

                            </div>
                            @if($product->stock > 0)
                            <div class="action clearfix">
                                <a style="margin-left:  37px; border-radius: 10px;" href="{{route('add.cart',$pro->id)}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>

                            </div>
                            @endif
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <?php
        $categoriesBrands = [];

        foreach ($categories as $cate) {
            $cateBrands = [];

            foreach ($brands as $brand) {
                foreach ($cate_brands as $cate_brand) {
                    if ($cate_brand->category_id == $cate->id && $cate_brand->brand_id == $brand->id) {
                        $cateBrands[] = $brand; // Thêm thương hiệu vào mảng của danh mục
                    }
                }
            }

            $categoriesBrands[$cate->id] = $cateBrands;
        }
        ?>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">

                        @foreach($categories as $cate)
                        <li>

                            <a href="{{route('product',['cate'=> $cate->id])}}" title="">{{$cate->name}}</a>
                            @if (!empty($categoriesBrands[$cate->id]))
                            <ul class="sub-menu">
                                @foreach ($categoriesBrands[$cate->id] as $brand)
                                <li>
                                    <a href="{{route('product',['cate'=> $cate->id, 'brand'=> $brand])}} title="">{{ $brand->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif

                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>
@stop