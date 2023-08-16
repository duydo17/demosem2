@extends('users.layouts.layout')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Lịch Sử Đơn Hàng</h3>
                </div>

            </div>
            <div class="section" id="paging-wp">
                <table class="table list-table-wp">
                    @if (session('success'))
                    <div class="alert alert-success">
                        <strong>Thành Công!</strong> {{session('success')}}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Lỗi!</strong>{{session('error')}}
                    </div>
                    @endif
                    <thead>
                        <tr style="font-weight: bold; text-align: center;">

                            <td><span class="thead-text">STT</span></td>
                            <td><span class="thead-text">Mã đơn hàng</span></td>
                            <td><span class="thead-text">Họ và tên</span></td>
                            <td style="width: 30px;"><span class="thead-text"></span></td>

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
                        <tr style="width: 100%; height: 30px; text-align: center;  ">
                            <td><span class="tbody-text">{{$t++}}</h3></span></td>
                            <td> <span class="tbody-text">{{$order->order_code}}</h3></span> </td>
                            <div class="tb-title fl-left">
                                @foreach($users as $user)
                                @if($order->user_id == $user->id )
                                <td><span class="tbody-text" style="font-weight: 500;">{{$user->fullname}}</h3></span></td>
                                @endif
                                @endforeach

                            </div>
                            <td style="width: 30px;">
                                
                                    @if($order->status == "đang đóng gói")
                                    <a href="{{route('delete_order_history', $order->id)}}" onclick="return confirm('bạn muốn xóa đơn hàng này?')" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                    @endif

                               

                            </td>
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
                            @if($order->status == "đang giao hàng")
                            <td ><span class="badge badge-primary" style="width: 130px;">{{$order->status}}</span></td>
                            @endif
                            @if($order->status == "giao thành công")
                            <td><span class="badge badge-success" style="width: 130px;">{{$order->status}}</span></td>
                            @endif
                            <td><span class="tbody-text">{{$order->created_at}}</span></td>
                            <td><a href="{{route('order.history.detail',$order->id)}}" title="" class="tbody-text">Chi tiết</a></td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>

@stop