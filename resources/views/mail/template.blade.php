<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Đơn Hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .content {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin: 20px 0;
        }

        .header-icon {
            font-size: 24px;
            margin-right: 5px;
        }

        .detail {
            margin-bottom: 15px;
        }

        .detail h5 {
            font-size: 16px;
            margin-bottom: 5px;
            display: inline-block;
        }

        .detail span {
            font-size: 14px;
            color: #333;
            display: block;
            margin-left: 30px;
        }

        .product table {
            width: 100%;
            border-collapse: collapse;
        }

        .product th,
        .product td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .product th {
            font-weight: bold;
            background-color: #f5f5f5;
        }

        .total {

            margin-top: 20px;
        }

        .quantity {
            font-size: 16px;
            color: #333;
            margin-right: 10px;
        }

        .total-amount {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .icon {
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="header">
            <h3>MID SHOP: Cảm Ơn Bạn Đã Tin Tưởng Đặt Hàng Tại Hệ Thống Cửa Hàng!!!</h3>
        </div>
        <h3><i class='fas fa-pencil-alt' style='font-size:25px; color: green;'></i> Thông Tin Đơn Hàng</h3>
        <div class="detail">
            <h5><i class='fas fa-barcode icon' style="color:#00BFFF"></i> Mã Đơn Hàng</h5>
            <span>{{session('order_code')}}</span>
        </div>
        <div class="detail">
            <h5><i class="fa fa-address-card icon" style="color:#FF0000"></i> Địa Chỉ Nhận Hàng</h5>
            <span>{{session('customer_address')}}</span>
        </div>
        <div class="detail">
            <h5><i class="fa fa-cc-visa icon" style="color: blue;"></i> Hình Thức Thanh Toán</h5>
            <span>{{session('payment')}}</span>
        </div>
        <div class="detail">
            <h5><i class="fa fa-phone icon" style="color:red"></i> Số Điện Thoại</h5>
            <span>{{session('phone')}}</span>
        </div>
        <div class="product">
            <table>
                <thead>
                    <tr>
                        <th class="thead-text">STT</th>                        
                        <th class="thead-text">Tên sản phẩm</th>
                        <th class="thead-text">Đơn giá</th>
                        <th class="thead-text">Số lượng</th>
                        <th class="thead-text">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $stt = 1
                    @endphp
                    @foreach(session('cart') as $row)
                    <tr>
                        <td>{{$stt++}}</td>      
                        <td>{{$row->name}}</td>
                        <td>{{number_format($row->price,0,',','.')}}đ</td>
                        <td>{{$row->qty}}</td>
                        <td>{{number_format($row->total,0,',','.')}}đ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total">
                <div class="quantity">
                    <span style="color: blue;"><i class="fas fa-shopping-bag icon"></i>Tổng Số Lượng: {{session('qty')}} sản phẩm</span>
                </div>
                <div class="total-amount" style="margin-top: 10px;">
                    <span style="color: red;"><i class="fas fa-coins icon" style="color: red;"></i>Tổng Đơn Hàng: {{session('cart_total')}}đ</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>