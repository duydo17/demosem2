@extends('users.layouts.layout')
@section('content')

<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible"">
                <button type=" button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Thành Công!</strong> {{session('success')}}
            </div>
            @endif
           
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Lỗi!</strong>{{session('error')}}
            </div>
            @endif
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    @foreach($sliders as $slider)
                    <div class="item">
                        <img src="{{url('sliders/'.$slider->thumbnail)}}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>


            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="{{url('users/images/icon-1.png')}}">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{url('users/images/icon-2.png')}}">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{url('users/images/icon-3.png')}}">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{url('users/images/icon-4.png')}}">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{url('users/images/icon-5.png')}}">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm mới nhất</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($newproducts as $new)
                        <form action="{{route('add.cart',$new->id)}}" method="post">
                            @csrf
                            <li>
                                <a href="{{route('product.detail', $new->id)}}" title="" class="thumb">
                                    <img src="{{asset($new->product_thumbnail[0]->image)}}" style="width: 190px; height: 150px;">
                                </a>
                                <a href="{{route('product.detail', $new->id)}}" title="" style="min-height: 50px;" class="product-name">{{$new->name}}</a>
                                <div class="price">
                                    <span class="new">Giá: {{number_format($new->price,0,',','.')}}đ</span>

                                </div>
                                @if($new->stock > 0 )
                                <div class="action clearfix">
                                    <button style="margin-left: 37px; border-radius: 10px;" class="add-cart">Thêm giỏ hàng</button>
                                </div>
                                @endif
                            </li>
                        </form>
                        @endforeach
                    </ul>
                </div>
            </div>
            @foreach($categories as $cate)
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">{{$cate->name}}</h3>
                </div>

                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach($products as $product)
                        <form action="{{route('add.cart',$product->id)}}" method="post">
                            @csrf
                            @if($cate->id == $product->category_id)

                            <li>
                                <a href="{{route('product.detail', $product->id)}}" title="" class="thumb">
                                    <img src="{{asset($product->product_thumbnail[0]->image)}}" style="width: 190px; height: 150px;">
                                </a>
                                <a href="{{route('product.detail', $product->id)}}" title="" style="min-height: 50px;" class="product-name">{{$product->name}}</a>
                                <div class="price">
                                    <span class="new">Giá: {{number_format($product->price,0,',','.')}}đ</span>
                                </div>
                                @if($product->stock > 0)
                                <div class="action clearfix">
                                    <button style="margin-left: 37px; border-radius: 10px;" class="add-cart">Thêm giỏ hàng</button>
                                </div>
                                @endif

                            </li>

                            @endif
                        </form>
                        @endforeach
                    </ul>
                </div>
            </div>
            <hr>
            @endforeach
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
            <div class=" section" id="selling-wp">
                                        <div class="section-head">
                                            <h3 class="section-title">Sản phẩm bán chạy</h3>
                                        </div>
                                        <div class="section-detail">
                                            <ul class="list-item clearfix">
                                                @foreach($bestSellingProducts as $best)
                                                @foreach($products as $product)
                                                @if($best->product_id == $product->id)
                                                <form action="{{route('add.cart',$product->id)}}" method="post" style="margin-top: 10px;">
                                                    @csrf
                                                    <li class="clearfix">
                                                        <a href="{{route('product.detail', $product->id)}}" title="" class="thumb fl-left">
                                                            <img src="{{asset($product->product_thumbnail[0]->image)}}" alt="">
                                                        </a>
                                                        <div class="info fl-right">
                                                            <a href="{{route('product.detail', $product->id)}}" title="" class="product-name">{{$product->name}}</a>
                                                            <div class="price">
                                                                <span class="new">Giá: {{number_format($product->price,0,',','.')}}đ</span>

                                                            </div>
                                                            @if($product->stock > 0)
                                                            <div class="action clearfix">
                                                                <button style="margin-left: 20px; border: none; border-radius: 10px;" class="add-cart">Thêm giỏ hàng</button>
                                                            </div>
                                                            @endif
                                                        </div>

                                                    </li>
                                                </form>
                                                @endif
                                                @endforeach
                                                @endforeach
                                            </ul>
                                        </div>
                </div>
            </div>
        </div>
    </div>


    @stop