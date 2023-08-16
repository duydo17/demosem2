@extends('admin.layouts.layout')
@section('content')
<div id="content" class="fl-right">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
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
                        <tr style="text-align: center;">

                            <td><span class="thead-text">STT</span></td>
                            <td><span class="thead-text">Mã đơn hàng</span></td>
                            <td><span class="thead-text">Họ và tên</span></td>
                            <td><span class="thead-text">Số Điện Thoại</span></td>
                            <td><span class="thead-text">Địa Chỉ</span></td>
                            <td><span class="thead-text">Số sản phẩm</span></td>
                            <td><span class="thead-text">Tổng giá</span></td>
                            <td><span class="thead-text">Giao Hàng</span></td>


                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $t=1
                        @endphp
                        @foreach($orders as $order)
                        @if($order->status == 'đang đóng gói')
                        <tr style="text-align: center; height: 20px;">

                            <td><span class="tbody-text">{{$t++}}</h3></span></td>
                            <td> <span class="tbody-text">{{$order->order_code}}</h3></span> </td>


                            <div class="tb-title fl-left">
                                @foreach($customers as $customer)
                                @if($order->customer_id == $customer->id )
                                <td><span class="tbody-text">{{$customer->fullname}}</h3></span> </td>
                                @endif
                                @endforeach
                            </div>
                            @foreach($customers as $customer)
                            @if($order->customer_id == $customer->id )
                            <td><span class="tbody-text">{{$customer->phone}}</span></td>
                            @endif
                            @endforeach
                            @foreach($customers as $customer)
                            @if($order->customer_id == $customer->id )
                            <td><span class="tbody-text">{{$customer->address}}</span></td>
                            @endif
                            @endforeach
                            <td><span class="tbody-text">{{$order->product_qty}}</span></td>
                            <td><span class="tbody-text">{{$order->cart_total}}đ</span></td>
                            <td style="width: 150px; background-color: #008B00; text-align: center; border-radius: 30px;"><a href="{{route('update.shipper',$order->id)}}" title="" style="color: white; font-size: 20px;   border-radius: 30px;  ">Giao Hàng</a></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <div class="section" id="paging-wp">
        <div class="section-detail clearfix">

            <ul id="list-paging" class="fl-right">
                {{$orders->links()}}
            </ul>
        </div>
    </div>
</div>
@stop