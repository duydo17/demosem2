@extends('users.layouts.layout')
@section('content')

<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
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
                        <li>
                            <a href="{{route('product.detail', $new->id)}}" title="" class="thumb">
                                <img src="{{asset($new->product_thumbnail[0]->image)}}" style="width: 190px; height: 150px;">
                            </a>
                            <a href="{{route('product.detail', $new->id)}}" title="" class="product-name">{{$new->name}}</a>
                            <div class="price">
                                <span class="new">{{number_format($new->price,0,',','.')}}đ</span>

                            </div>
                            @if($new->stock > 0 )
                            <div class="action clearfix">
                                <a style="margin-left: 37px;" href="{{route('add.cart',$new->id)}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>

                            </div>
                            @endif
                        </li>
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
                        @if($cate->id == $product->category_id)
                        <li>
                            <a href="{{route('product.detail', $product->id)}}" title="" class="thumb">
                                <img src="{{asset($product->product_thumbnail[0]->image)}}" style="width: 190px; height: 150px;">
                            </a>
                            <a href="{{route('product.detail', $product->id)}}" title="" class="product-name">{{$product->name}}</a>
                            <div class="price">
                                <span class="new">{{number_format($product->price,0,',','.')}}đ</span>
                            </div>
                            @if($product->stock > 0)
                            <div class="action clearfix">
                                <a style="margin-left: 37px;" href="{{route('add.cart',$product->id)}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>

                            </div>
                            @endif
                            @endif
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
                                            <ul class="list-item">
                                                <li class="clearfix">
                                                    <a href="?page=detail_product" title="" class="thumb fl-left">
                                                        <img src="public/images/img-pro-13.png" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="?page=detail_product" title="" class="product-name">Laptop Asus A540UP I5</a>
                                                        <div class="price">
                                                            <span class="new">5.190.000đ</span>
                                                            <span class="old">7.190.000đ</span>
                                                        </div>
                                                        <a href="" title="" class="buy-now">Mua ngay</a>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="?page=detail_product" title="" class="thumb fl-left">
                                                        <img src="public/images/img-pro-11.png" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                        <div class="price">
                                                            <span class="new">15.190.000đ</span>
                                                            <span class="old">17.190.000đ</span>
                                                        </div>
                                                        <a href="" title="" class="buy-now">Mua ngay</a>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="?page=detail_product" title="" class="thumb fl-left">
                                                        <img src="public/images/img-pro-12.png" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                        <div class="price">
                                                            <span class="new">15.190.000đ</span>
                                                            <span class="old">17.190.000đ</span>
                                                        </div>
                                                        <a href="" title="" class="buy-now">Mua ngay</a>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="?page=detail_product" title="" class="thumb fl-left">
                                                        <img src="public/images/img-pro-05.png" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                        <div class="price">
                                                            <span class="new">15.190.000đ</span>
                                                            <span class="old">17.190.000đ</span>
                                                        </div>
                                                        <a href="" title="" class="buy-now">Mua ngay</a>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="?page=detail_product" title="" class="thumb fl-left">
                                                        <img src="public/images/img-pro-22.png" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                        <div class="price">
                                                            <span class="new">15.190.000đ</span>
                                                            <span class="old">17.190.000đ</span>
                                                        </div>
                                                        <a href="" title="" class="buy-now">Mua ngay</a>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="?page=detail_product" title="" class="thumb fl-left">
                                                        <img src="public/images/img-pro-23.png" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                        <div class="price">
                                                            <span class="new">15.190.000đ</span>
                                                            <span class="old">17.190.000đ</span>
                                                        </div>
                                                        <a href="" title="" class="buy-now">Mua ngay</a>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="?page=detail_product" title="" class="thumb fl-left">
                                                        <img src="public/images/img-pro-18.png" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                        <div class="price">
                                                            <span class="new">15.190.000đ</span>
                                                            <span class="old">17.190.000đ</span>
                                                        </div>
                                                        <a href="" title="" class="buy-now">Mua ngay</a>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="?page=detail_product" title="" class="thumb fl-left">
                                                        <img src="public/images/img-pro-15.png" alt="">
                                                    </a>
                                                    <div class="info fl-right">
                                                        <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                        <div class="price">
                                                            <span class="new">15.190.000đ</span>
                                                            <span class="old">17.190.000đ</span>
                                                        </div>
                                                        <a href="" title="" class="buy-now">Mua ngay</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                </div>
            </div>
        </div>
    </div>


    @stop