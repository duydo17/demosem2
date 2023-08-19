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
                            <td><span class="thead-text" style="width: 20px;"></span></td>
                            <td><span class="thead-text">Số sản phẩm</span></td>
                            <td><span class="thead-text">Tổng giá</span></td>
                            <td><span class="thead-text">Trạng thái</span></td>
                            <td><span class="thead-text">Thời gian</span></td>
                            <td><span class="thead-text">Chi tiết</span></td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $t=1
                        @endphp
                        @foreach($orders as $order)
                        <tr style="text-align: center;"> 
                            <td><span class="tbody-text">{{$t++}}</h3></span></td>
                            <td> <span class="tbody-text">{{$order->order_code}}</h3></span> </td>
                            <div class="tb-title fl-left">
                                @foreach($customers as $customer)
                                @if($order->customer_id == $customer->id )
                                <td><span class="tbody-text">{{$customer->fullname}}</h3></span>
                                    @endif
                                    @endforeach
                            </div></td>
                            @if($order->status != "giao thành công")
                            <td  style="width: 20px;">
                            <ul class="list-operation fl-right">

                                <li><a href="{{route('delete.order',$order->id)}}" onclick="return confirm('bạn muốn xóa đơn hàng này?')" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                            </ul>
                            </td>
                            @else
                            <td  style="width: 20px;">  </td>
                            @endif
                            <td><span class="tbody-text">{{$order->product_qty}}</span></td>
                            <td><span class="tbody-text">{{$order->cart_total}}đ</span></td>
                            @if($order->status == "đang đóng gói")
                            <td><span class="badge badge-secondary" style="width: 130px;">{{$order->status}}</span></td>
                            @endif
                            @if($order->status == "đang vận chuyển")
                            <td ><span class="badge badge-primary" style="width: 130px;">{{$order->status}}</span></td>
                            @endif
                            @if($order->status == "hủy đơn hàng")
                            <td> <span class="badge badge-danger" style="width: 130px;">{{$order->status}}</span></td>
                            @endif
                            
                            @if($order->status == "giao thành công")
                            <td><span class="badge badge-success" style="width: 130px;">{{$order->status}}</span></td>
                            @endif

                            <td><span class="tbody-text">{{$order->created_at}}</span></td>
                            <td><a href="{{route('order.detail',$order->id)}}" title="" class="tbody-text">Chi tiết</a></td>
                        </tr>

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