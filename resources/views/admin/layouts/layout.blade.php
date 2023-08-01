<!DOCTYPE html>
<html>

<head>
    <title>Quản lý MIDSHOP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('admin/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/css/import/add_cat.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/css/import/change_pass.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/css/import/detail_order.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/css/import/fonts.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/css/import/global.css') }}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/css/import/info_account.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/css/import/list_post.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/css/import/list_product.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/css/import/menu.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('admin/css/import/sidebar.css')}}" type="text/css">
    
    
    <script src="{{asset('admin/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin/js/main.js')}}"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div id="site">
        <div id="container">
            <div id="header-wp">
                <div class="wp-inner clearfix">
                    <a href="?page=list_post" title="" id="logo" class="fl-left">ADMIN</a>
                    <ul id="main-menu" class="fl-left">
                        <li>
                            <a href="?page=list_post" title="">Trang</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?page=add_page" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?page=list_page" title="">Danh sách trang</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?page=list_post" title="">Bài viết</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?page=add_post" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="?page=list_post" title="">Danh sách bài viết</a>
                                </li>
                                <li>
                                    <a href="?page=list_cat" title="">Danh mục bài viết</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="?page=list_product" title="">Sản phẩm</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?page=add_product" title="">Thêm mới</a>
                                </li>
                                <li>
                                    <a href="{{route('list.product')}}" title="">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{route('list.category')}}" title="">Danh mục sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{route('list.brand')}}" title="">Dannh mục thương hiệu</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="" title="">Bán hàng</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="?page=list_order" title="">Danh sách đơn hàng</a>
                                </li>
                                <li>
                                    <a href="?page=list_order" title="">Danh sách khách hàng</a>
                                </li>
                            </ul>
                        </li>
                       
                    </ul>
                    <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                        <button class="dropdown-toggle clearfix" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <div id="thumb-circle" class="fl-left">
                                <img src="{{asset('admin/images/img-admin.png')}}">
                            </div>
                            <h3 id="account" class="fl-right">Admin</h3>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="?page=info_account" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                            <li><a href="#" title="Thoát">Thoát</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="main-content-wp" class="list-post-page">
                <div class="wrap clearfix">
                    <!-- sidebar -->
                    <div id="sidebar" class="fl-left" style="margin-top: 35px;">
                        <ul id="sidebar-menu">
                            <li class="nav-item">
                                <a href="" title="" class="nav-link nav-toggle">
                                    <span class="fa fa-map icon"></span>
                                    <span class="title">Trang</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="?page=add_page" title="" class="nav-link">Thêm mới</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=list_page" title="" class="nav-link">Danh sách các trang</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" title="" class="nav-link nav-toggle">
                                    <span class="fa fa-pencil-square-o icon"></span>
                                    <span class="title">Bài viết</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="?page=add_post" title="" class="nav-link">Thêm mới</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=list_post" title="" class="nav-link">Danh sách bài viết</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="?page=list_cat" title="" class="nav-link">Danh mục bài viết</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" title="" class="nav-link nav-toggle">
                                    <span class="fa fa-product-hunt icon"></span>
                                    <span class="title">Sản phẩm</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{route('create.product')}}" title="" class="nav-link">Thêm mới</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('list.product')}}" title="" class="nav-link">Danh sách sản phẩm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('admin/list_category')}}" title="" class="nav-link">Danh mục sản phẩm</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('list.brand')}}" title="" class="nav-link">Danh mục thương hiệu</a>
                                    </li>
                                          
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="" title="" class="nav-link nav-toggle">
                                    <span class="fa fa-database icon"></span>
                                    <span class="title">Bán hàng</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{route('list.order')}}" title="" class="nav-link">Danh sách đơn hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('list.customer')}}" title="" class="nav-link">Danh sách khách hàng</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="nav-item">
                                <a href="#" title="" class="nav-link nav-toggle">
                                    <i class="fa fa-sliders" aria-hidden="true"></i>
                                    <span class="title">Slider</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{route('create.slider')}}" title="" class="nav-link">Thêm mới</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('list.slider')}}" title="" class="nav-link">Danh sách slider</a>
                                    </li>
                                </ul>
                            </li>
                           
                            <li class="nav-item">
                                <a href="#" title="" class="nav-link nav-toggle">
                                    <i class="material-icons" style="font-size:36px" aria-hidden="true"></i>
                                    <span class="title">Feedback</span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="{{route('list.comment')}}" title="" class="nav-link">Danh Sách Ý Kiến</a>
                                    </li>                                   
                                </ul>
                            </li>
                            
                        </ul>
                    </div>

                    <!-- pages content -->

                    @yield('content')
                   
                </div>
            </div>

            <!-- footer -->
            <div id="footer-wp">
                <div class="wp-inner">
                    <p id="copyright">Copyright © Admin by Group -1-T1.202210.E0 FPT Aptech </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>