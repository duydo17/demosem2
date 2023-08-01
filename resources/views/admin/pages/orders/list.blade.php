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

                <form method="GET" class="form-s fl-right">
                    <input type="text" name="s" id="s">
                    <input type="submit" name="sm_s" value="Tìm kiếm">
                </form>
            </div>

            <div class="table-responsive">
                <table class="table list-table-wp">
                    <thead>
                        <tr>
                            <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                            <td><span class="thead-text">STT</span></td>
                            <td><span class="thead-text">Mã đơn hàng</span></td>
                            <td><span class="thead-text">Họ và tên</span></td>
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
                        <tr>
                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                            <td><span class="tbody-text">{{$t++}}</h3></span></td>
                            <td> <span class="tbody-text">{{$order->order_code}}</h3></span> </td>


                            <div class="tb-title fl-left">
                                @foreach($customers as $customer)
                                @if($order->customer_id == $customer->id )
                                <td><span class="tbody-text">{{$customer->fullname}}</h3></span> 
                                @endif
                                @endforeach
                            </div>
                            <ul class="list-operation fl-right">
                               
                                <li><a href="{{route('delete.order',$order->id)}}" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                            </ul>
                            </td>
                            <td><span class="tbody-text">{{$order->product_qty}}</span></td>
                            <td><span class="tbody-text">{{$order->cart_total}}</span></td>
                            <td><span class="tbody-text">{{$order->status}}</span></td>
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