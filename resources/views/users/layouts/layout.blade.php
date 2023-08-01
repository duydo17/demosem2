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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">

                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="{{route('home')}}" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="{{route('product')}}" title="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="?page=blog" title="">Tin Tức</a>
                                </li>

                                <li>
                                    <a href="?page=contact" title="">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="?page=home" title="" id="logo" class="fl-left"><img style="width:100px; height: 60px;"
                                src="{{asset('users/images/z4490215746918_7b4928c3c3cd87b9e01be18053c391f5.jpg')}}" /></a>
                        <div id="search-wp" class="fl-left">
                            <form method="POST" action="">
                                <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <button type="submit" id="sm-s">Tìm kiếm</button>
                            </form>
                        </div>
                        
                        <div id="action-wp" class="fl-right" style="margin-right: 200px;">

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
                                    <ul class="list-cart">
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
                                    <dic class="action-cart clearfix">
                                        <a href="{{route('show.cart')}}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                        <a href="{{route('checkout')}}" title="Thanh toán" class="checkout fl-right">Thanh
                                            toán</a>
                                    </dic>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
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
                        <img src="public/images/img-foot.png" alt="">
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
    <a href="?page=home" title="" class="logo">VSHOP</a>
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
                <a href="?page=category_product" title>Đồ dùng sinh hoạt</a>
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
<div id="btn-top"><img src="public/images/icon-to-top.png" alt=""/></div>
<div id="fb-root"></div>
<script>(function (d, s, id) {
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
    #footer-wp #foot-body .block{
        width: 33%;
    }
</style>
</body>
</html>