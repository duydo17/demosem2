@extends('users.layouts.layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
<div id="main-content-wp" class="clearfix blog-page">
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
        <div class="main-content fl-right" style="width: 100%; min-height: 335px;">


        <div class="section" id="info">
        <div class="section-head" style="margin-bottom: 30px;">
            <h2 class="section-title">Thông tin đơn hàng</h2>
        </div>
        
        <ul class="list-item">
            <li>
            <h5><i class='fas fa-barcode icon' style="color:#00BFFF"></i> Mã Đơn Hàng</h5>
                <span class="detail">{{$order->order_code}}</span>
            </li>
            <li>
            <h5><i class="fa fa-address-card icon" style="color:#FF0000"></i> Địa Chỉ Nhận Hàng</h5>
                <span class="detail">{{$order->customer->address}}</span>
            </li>
            <li>
            <h5><i class="fa fa-cc-visa icon" style="color: blue;"></i> Hình Thức Thanh Toán</h5>
                <span class="detail">{{$order->payment}}</span>
            </li>
            <form method="POST" action="">
                <li>
                    <h5 class="title">**Tình trạng đơn hàng**</h5>
                    <span class="detail">{{$order->status}}</span>
                </li>
            </form>
        </ul>
    </div>
    <div class="section">
        <div class="section-head" style="margin-bottom: 20px;">
            <h3 class="section-title">Sản phẩm đơn hàng</h3>
        </div>
        <div class="table-responsive">
            <table class="table info-exhibition">
                <thead>
                    <tr style="font-weight: bold;">
                        <td class="thead-text">STT</td>
                        <td class="thead-text">Ảnh sản phẩm</td>
                        <td class="thead-text">Tên sản phẩm</td>
                        <td class="thead-text">Đơn giá</td>
                        <td class="thead-text">Số lượng</td>
                        <td class="thead-text">Thành tiền</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $t=1
                    @endphp

                    @foreach($order->order_detail as $o)

                    <tr>
                        <td class="thead-text">{{$t++}}</td>

                        <td class="thead-text">
                            <div class="thumb">
                                @foreach($products as $product)
                                @if($o->product_id == $product->id)
                                <img src="{{asset($product->product_thumbnail[0]->image)}}" style="width: 100px;" alt="">
                                @endif
                                @endforeach
                            </div>
                        </td>
                        <td class="thead-text">{{$o->product_name}}</td>
                        @foreach($products as $product)
                        @if($o->product_id == $product->id)
                        <td class="thead-text">{{number_format($product->price,0,',','.')}}đ</td>
                        @endif
                        @endforeach
                        <td class="thead-text">{{$o->quantity}}</td>
                        <td class="thead-text">{{number_format($o->total_price,0,',','.')}}đ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="section">
        <h3 class="section-title" style="margin-top: 15px;">Giá trị đơn hàng</h3>
        <div class="section-detail">
            <ul class="list-item clearfix">
                <li>
                    <span style="margin-right: 20px;" class="total-fee"><i class="fas fa-shopping-bag icon" style="color: #00BFFF;"></i>Tổng số lượng</span>
                    <span class="total" ><i class="fas fa-coins icon" style="color: red;"></i>Tổng đơn hàng</span>
                </li>
                <li>
                    <span style="margin-right: 40px; margin-left: 10px;" class="total-fee">{{$orders->product_qty}} sản phẩm</span>
                    <span style="color: red; margin-left: 10px;" class="total">{{$orders->cart_total}} đ</span>
                </li>
            </ul>
        </div>
    </div>
</div>
        </div>

    </div>
</div>

@stop
<style>
    .detail{
        font-size: 20px;
       font-family: 'Times New Roman', Times, serif;
       margin-left: 20px;
       margin-bottom: 10px;
    }
    .title{
        color: blue;
    }
</style>