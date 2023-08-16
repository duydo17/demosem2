@extends('users.layouts.layout')
@section('content')
<div id="main-content-wp" class="clearfix detail-blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <!-- <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul> -->
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">
                        <h2>{{$post->title}}</h2>
                    </h3>
                </div>
                <div class="section-detail">
                    <span class="create-date">{{$post->created_at}}</span>
                    <div class="detail">
                        {!! $post->short_dest !!}
                        {!! $post->post_detail !!}
                    </div>
                </div>
            </div>
            <div class="section" id="social-wp">
                <div class="section-detail">
                    
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($bestSellingProducts as $best)
                        @foreach($products as $product)
                        @if($best->product_id == $product->id)
                        <form action="{{route('add.cart',$product->id)}}" method="post">
                            @csrf
                        <li class="clearfix">
                            <a href="{{route('product.detail', $product->id)}}" title="" class="thumb fl-left">
                                <img src="{{asset($product->product_thumbnail[0]->image)}}" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="{{route('product.detail', $product->id)}}" title="" class="product-name">{{$product->name}}</a>
                                <div class="price">
                                    <span class="new">{{number_format($product->price,0,',','.')}}đ</span>
                                   
                                </div>
                                <button style="margin-left: 10px; border: none;"  class="add-cart">Thêm giỏ hàng</button>
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