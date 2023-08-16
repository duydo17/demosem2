@extends('users.layouts.layout')
@section('content')
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <!-- <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                <form method="POST" action="{{route('add.checkout')}}" name="form-checkout">
                    @csrf
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" value="{{$user->fullname}}" id="fullname" disabled>
                            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{$user->email}}" disabled id="email">
                            @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" value="{{$user->address}}" name="address" id="address">
                            @error('address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" value="{{$user->phone}}" id="phone">
                            @error('phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="note">Ghi chú</label>
                            <textarea name="note" style="width: 555px; height: 100px;"></textarea>
                        </div>
                    </div>
              
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(Cart::content() as $row)
                        <tr class="cart-item">
                            <td class="product-name">{{$row->name}}<strong class="product-quantity">x {{$row->qty}}</strong></td>
                            <td class="product-total">{{number_format($row->total,0,',','.')}}đ</td>
                        </tr>
                       @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price">{{Cart::total()}}đ</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" name="payment-method" value="Thanh Toán Tại Cửa Hàng">
                            <label for="direct-payment">Thanh toán tại cửa hàng</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment-method" value="Thanh Toán Tại Nhà">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                        @error('payment-method')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                    </ul>
                </div>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" value="Đặt hàng">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@stop
<style>
    .title{
        color: blue;
    }
    .fa-trash{
        color: red;
    }
    .fa-pencil{
        color: blue;
    }
    .cancelbtn{
        border-radius: 30px;
    }
</style>