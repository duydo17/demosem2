<!DOCTYPE html>
<html>

<head>
    <title>ISMART STORE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('users/css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/reset.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/carousel/owl.theme.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/font-awesome/css/font-awesome.min.cs')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/blog.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/cart.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/category_product.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/checkout.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/detail_blog.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/detail_product.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/fonts.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/footer.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/global.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/header.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/css/import/home.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('users/responsive.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('users/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('users/js/elevatezoom-master/jquery.elevatezoom.js')}}" type="text/javascript"></script>
    <script src="{{asset('users/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('users/js/carousel/owl.carousel.js')}}" type="text/javascript"></script>
    <script src="{{asset('users/js/main.js')}}" type="text/javascript"></script>
    <link rel='stylesheet' href='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css'>
<script src='https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
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
    input{
        border-radius: 10px;
        border-color: #00FF00;
    }
</style>


<body>

    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">

                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="{{route('home')}}" title=""><i class="fa fa-home" style="color: white;"></i>Trang chủ</a>
                                </li>
                                <li>
                                    <a href="{{route('product')}}" title="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{route('blog')}}" title="">Tin Tức</a>
                                </li>
                                @if(session('id'))
                                @php
                                $id = session('id');
                                @endphp
                                <li>
                                    <a href="{{route('history',$id)}}" title="">Lịch Sử Đơn Hàng</a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{route('contact')}}" title="">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="{{route('home')}}" title="" id="logo" class="fl-left"><img style="width:100px; height: 60px;" src="{{asset('users/images/z4490215746918_7b4928c3c3cd87b9e01be18053c391f5.jpg')}}" /></a>
                        <div id="search-wp" class="fl-left">
                            <form action="{{route('product')}}">
                                <input type="text" style="border-radius: 40px;" name="search" id="s" value="{{request()->input('search')}}" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s" style="border-radius: 30px; font-size: 13px;  margin-left: 2px;"><i  class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div style="float:right; margin: 29px 20px; color: white;">
                            @if(!session('id'))
                            <input type="submit" style="width: 90px; height: 30px;" class="btn btn-light btn-sm" value="Đăng Nhập" onclick="document.getElementById('id01').style.display='block'">
                            <input type="submit" style="width: 80px; height: 30px;" class="btn btn-light btn-sm" value="Đăng Ký" onclick="document.getElementById('id02').style.display='block'">
                            @endif
                        </div>
                        @if(session('id'))
                        <div id="dropdown-user" class="dropdown dropdown-extended fl-right" style="margin: 18px 20px; color: white;">
                            <button class="dropdown-toggle clearfix" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <div id="thumb-circle" class="fl-left" style="margin-top: 4px;">
                                    <img src="{{asset('admin/images/img-admin.png')}}" style="color: white; width: 40px;">
                                </div>
                                <h3  id="account" style="font-size: 20px; margin-top: 13px; margin-left: 5px; max-width: 150px;" class="fl-right">{{session('username')}}</h3>
                            </button>
                            @php
                            $id = session('id');
                            @endphp
                            <ul class="dropdown-menu">
                                <li><a href="{{route('info_account',$id)}}" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                <li><a href="{{route('logout')}}" title="Thoát">Đăng Xuất</a></li>
                            </ul>
                        </div>
                        @endif

                        <div id="action-wp" class="fl-right" >

                            <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span id="num">2</span>
                            </a>

                            <div id="cart-wp" class="fl-right">
                                <div id="btn-cart">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">{{Cart::count()}}</span>
                                </div>
                                <div id="dropdown">
                                    <p class="desc">Có <span>{{Cart::count()}} sản phẩm</span> trong giỏ hàng</p>
                                    <ul class="list-cart" style="min-height: 90px;">
                                        @foreach(Cart::content() as $row)
                                        <li class="clearfix">
                                            <a href="" title="" class="thumb fl-left">
                                                <img src="{{asset($row->options->thumbnail)}}" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="" title="" class="product-name">{{$row->name}}</a>
                                                <p class="price">{{number_format($row->total,0,',','.')}}đ</p>
                                                <p class="qty">Số lượng: <span>{{$row->qty}}</span></p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="total-price clearfix">
                                        <p class="title fl-left">Tổng:</p>
                                        <p class="price fl-right">{{Cart::total()}}đ</p>
                                    </div>
                                    <div class="action-cart clearfix">
                                        <a href="{{route('show.cart')}}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                        <a href="{{route('checkout')}}" title="Thanh toán" class="checkout fl-right">Thanh
                                            toán</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div id="id01" class="modal">
                <form class="modal-content animate" action="{{route('login.user')}}" method="post" style="width: 600px;">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                    </div>
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Danger!</strong>{{session('error')}}
                    </div>
                    @endif
                    <h2 style="text-align: center;">Đăng Nhập</h2>
                    <div class="container">
                        @csrf
                        <label for="username"><b>Tên Đăng Nhập</b></label>
                        <input class="input_text" type="text" placeholder="Nhập username" name="username">
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label for="password"><b>Mật Khẩu</b></label>
                        <input type="password" class="input_password" placeholder="Nhập Password" name="password">
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <button type="submit" class="button_login">Đăng Nhập</button>

                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <span class="psw" >Quên <a href="{{route('forgotpassword')}}">Mật Khẩu?</a></span>
                    </div>
                </form>
            </div>
            <div id="id02" class="modal2">
                <form class="modal-content animate" action="{{route('signup')}}" method="post">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>

                    </div>
                    <h2 style="text-align: center;">Đăng Ký</h2>
                    <div class="container">
                        @csrf
                        <label for="fullname"><b>Họ Và Tên</b></label>
                        <input type="text" class="input_text" placeholder="Nhập Họ Và Tên" name="fullname" >
                        @error('fullname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label for="email"><b>Tên Đăng Nhập</b></label>
                        <input type="text" class="input_text" placeholder="Nhập Tên đăng nhập" name="username">
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label for="email"><b>Email</b></label>
                        <input type="text" class="input_text" placeholder="Nhập Email" name="email" >
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label for="password"><b>Mật Khẩu</b></label>
                        <input type="password" class="input_password" placeholder="Nhập Mật Khẩu" name="password" >
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label for="address"><b>Địa Chỉ</b></label>
                        <input type="text" class="input_text" placeholder="Nhập Địa Chỉ" name="address" >
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label for="phone"><b>Số Điện Thoại</b></label>
                        <input type="text" class="input_text" placeholder="Nhập Số Điện Thoại" name="phone" >
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <label for="gioitinh"><b>Giới Tính</b></label>
                        <div class="gender" style="width: 100px; display: flex;">
                            <input type="radio" id="male" name="gender" value="Male">
                            <label style="margin: 2px;" for="male">Nam</label>
                            <input type="radio" id="female" name="gender" value="Female">
                            <label style="margin: 2px;" for="female">Nữ</label>
                        </div>
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </br>
                        <button type="submit" class="button_login">Đăng Ký</button>

                    </div>

                    <div class="container" style="background-color:#f1f1f1">
                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>

                    </div>
                </form>
            </div>

            <!-- pages content -->

            @yield('content')




            <div id="footer-wp">
                <div id="foot-body">
                    <div class="wp-inner clearfix">
                        <div class="block" id="info-company">
                            <h3 class="title">MID Shop</h3>
                            <p class="desc">MID shop luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                            <div id="payment">
                                <div class="thumb">
                                    <img src="{{asset('users/images/img-foot.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="block menu-ft" id="info-shop">
                            <h3 class="title">Thông tin cửa hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <p>391A - Nam Kỳ Khởi Nghĩa - Q3 - TP.HCM</p>
                                </li>
                                <li>
                                    <p>0909.654.321 - 0989.989.989</p>
                                </li>
                                <li>
                                    <p>MIDshop@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="block menu-ft policy" id="info-shop">
                            <h3 class="title">Chính sách mua hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <a href="" title="">Quy định - chính sách</a>
                                </li>
                                <li>
                                    <a href="" title="">Chính sách bảo hành - đổi trả</a>
                                </li>
                                <li>
                                    <a href="" title="">Chính sách hội viện</a>
                                </li>
                                <li>
                                    <a href="" title="">Giao hàng - lắp đặt</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div id="foot-bot">
                    <div class="wp-inner">
                        <p id="copyright">Coppyright © by Group-1-T1.202210.E0 FPT Aptech</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-respon">
            <a href="?page=home" title="" class="logo">MID SHOP</a>
            <div id="menu-respon-wp">
                <ul class="" id="main-menu-respon">
                    <li>
                        <a href="?page=home" title>Trang chủ</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Điện thoại</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?page=category_product" title="">Iphone</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Samsung</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?page=category_product" title="">Iphone X</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Iphone 8</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Nokia</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Máy tính bảng</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?page=category_product" title="">Iphone</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Samsung</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?page=category_product" title="">Iphone X</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Iphone 8</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Nokia</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Laptop</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?page=category_product" title="">Iphone</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Samsung</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?page=category_product" title="">Iphone X</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Iphone 8</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Nokia</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="?page=blog" title>Blog</a>
                    </li>
                    <li>
                        <a href="#" title>Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="btn-top"><img src="public/images/icon-to-top.png" alt="" /></div>
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <style>
            #footer-wp #foot-body .block {
                width: 33%;
            }

            .input_text[type=text],
            .input_password[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            .button_login {
                background-color: #04AA6D;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            button:hover {
                opacity: 0.8;
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f12A43;
                cursor: pointer;
                border: none;
            }

            /* Center the image and position the close button */
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;
            }

            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            .container {
                padding: 16px;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }

            /* The Modal (background) */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
                padding-top: 60px;

            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto;
                /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 30%;
                /* Could be more or less, depending on screen size */
            }

            /* The Close Button (x) */
            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {
                    -webkit-transform: scale(0)
                }

                to {
                    -webkit-transform: scale(1)
                }
            }

            @keyframes animatezoom {
                from {
                    transform: scale(0)
                }

                to {
                    transform: scale(1)
                }
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }

                .cancelbtn {
                    width: 100%;
                }
            }

            .modal2 {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
                padding-top: 60px;
            }
        </style>
</body>

</html>
