@extends('admin.layouts.layout')
@section('content')
<div id="content" class="detail-exhibition fl-right">

    <div class="section" id="info">
        <div class="section-head">
            <h3 class="section-title">Thông tin đơn hàng</h3>
        </div>
        <ul class="list-item">
            <li>
                <h3 class="title">Mã đơn hàng</h3>
                <span class="detail">{{$orders->order_code}}</span>
            </li>
            <li>
                <h3 class="title">Địa chỉ nhận hàng</h3>
                <span class="detail">{{$orders->customer->address}}</span>
            </li>
            <li>
                <h3 class="title">Thông tin vận chuyển</h3>
                <span class="detail">{{$orders->payment}}</span>
            </li>
            <form method="POST" action="">
                <li>
                    <h3 class="title">Tình trạng đơn hàng</h3>
                    <select name="status">
                        <option value='payment'>Đang Xử Lý</option>
                        <option selected='selected' value='payment'>Đang Xử Lý</option>
                        <option value='2'>Thành công</option>
                    </select>
                    <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                </li>
            </form>
        </ul>
    </div>
    <div class="section">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm đơn hàng</h3>
        </div>
        <div class="table-responsive">
            <table class="table info-exhibition">
                <thead>
                    <tr>
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
                                <img src="{{asset($product->product_thumbnail[0]->image)}}" alt="">
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
        <h3 class="section-title">Giá trị đơn hàng</h3>
        <div class="section-detail">
            <ul class="list-item clearfix">
                <li>
                    <span class="total-fee">Tổng số lượng</span>
                    <span class="total">Tổng đơn hàng</span>
                </li>
                <li>
                    <span class="total-fee">{{$orders->product_qty}} sản phẩm</span>
                    <span class="total">{{$orders->cart_total}} đ</span>
                </li>
            </ul>
        </div>
    </div>
</div>

</div>
@stop