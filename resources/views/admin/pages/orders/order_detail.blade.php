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
                <span class="detail">{{$orders->payment}}, SĐT: {{$orders->customer->phone}}</span>
            </li>
            @if(!empty($shipper))
            @if(!empty($shipper->thumbnail))
            <li>
                <h3 class="title">Hình Ảnh Giao Hàng</h3>
               <img src="{{asset('shipper/'.$shipper->thumbnail)}}" alt="" width="150px">
            </li>
            @endif
            
            @if($order->id == $shipper->order_id)
            @if(!empty($shipper->note))
            <li>
                <h3 class="title">Lý Do Khách Hủy</h3>
                <span class="detail">{{$shipper->note}}</span>
            </li>
            @endif
            @endif
            
            @foreach($users as $user)
            @if($shipper->user_id == $user->id)
            <li>
                <h3 class="title">Nhân Viên Giao Hàng</h3>
                <span class="detail">{{$user->fullname  }}</span>
            </li>
            @endif

            @endforeach
            @endif
            <form method="POST" action="{{route('edit.status.order', $orders->id)}}">
            @csrf
                <li>
                    <h3 class="title">Tình trạng đơn hàng</h3>
                    <select name="status">
                     <option value="đang đóng gói" {{old('status',$orders->status)== 'đang đóng gói' ? 'selected' : ''}}>Đang Đóng Gói</option>                       
                     <option value="đang vận chuyển" {{old('status',$orders->status)== 'đang vận chuyển' ? 'selected' : ''}}>Đang Vận Chuyển</option>                       
                     
                     <option value="hủy đơn hàng" {{old('status',$orders->status)== 'hủy đơn hàng' ? 'selected' : ''}}>Hủy Đơn Hàng</option>                   
                     <option value="giao thành công" {{old('status',$orders->status)== 'giao thành công' ? 'selected' : ''}}>Giao Hàng Thành Công</option>                                                
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