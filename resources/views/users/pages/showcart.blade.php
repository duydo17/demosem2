@extends('users.layouts.layout')
@section('content')
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <!-- <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Sản phẩm làm đẹp da</a>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive" style="min-height: 220px;">
                <p>Hiện Tại có {{Cart::count()}} Trong Giỏ Hàng</p>
                @if(Cart::count() > 0)
                <form action="{{route('update.cart')}}" method="post">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td colspan="2">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Cart::content() as $row)
                            <tr>
                                <td>{{$row->code}}</td>
                                <td>
                                    <a href="" title="" class="thumb">
                                        <img src="{{asset($row->options->thumbnail)}}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="" title="" class="name-product">{{$row->name}}</a>
                                </td>
                                <td>{{number_format($row->price,0,',','.')}}đ</td>
                                <td>
                                    <input type="number" min='1' name="qty[{{$row->rowId}}]" value="{{$row->qty}}" class="num-order">
                                </td>
                                <td>{{number_format($row->total,0,',','.')}}đ</td>
                                <td>
                                    <a href="{{route('remove.cart',$row->rowId)}}" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span>{{Cart::total()}}đ</span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <button id="update-cart" type="submit">Cập nhật giỏ hàng</button>
                                            <a href="{{route('checkout')}}" title="" id="checkout-cart">Thanh toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
                @endif
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                    <a href="{{route('product')}}" title="" id="buy-more">Mua tiếp</a><br />
                    <a href="{{route('destroy.cart')}}" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
               
            </div> 
        </div>
       


    </div>
</div>
@stop
<style>
    .title{
        color: blue;
    }
    .fa-trash-o{
        color: red;
    }
    .fa-pencil{
        color: blue;
    }
    .cancelbtn{
        border-radius: 30px;
    }
</style>