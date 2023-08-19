@extends('users.layouts.layout')

@section('content')
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <!-- <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Điện thoại</a>
                    </li>
                </ul>
            </div>
        </div> -->
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <div class="filter-wp fl-right">

                        <div class="form-filter">
                            <form action="">
                            <select name="search_cate" value="{{request()->input('search_cate')}}" style="border-radius: 10px;">
                            <option value="">Chọn Danh Mục</option>
                            @foreach($categories as $cate)                                  
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                 @endforeach
                                   
                                </select>
                                <select name="select" value="{{request()->input('select')}}" style="border-radius: 10px;">
                                    <option value="" >Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="4">Giá thấp lên cao</option>
                                </select>
                                <button type="submit" style="border-radius: 30px; background-color: #333333; margin-left: 5px;">Sắp Xếp</button>
                            </form>
                        </div>
                    </div>
                </div>
              
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach($products as $product)
                       
                        <form action="{{route('add.cart',$product->id)}}" method="post">
                @csrf
                        <li>
                            <a href="{{route('product.detail', $product->id)}}" title="" class="thumb">
                                <img src="{{asset($product->product_thumbnail[0]->image)}}" style="width: 190px; height: 150px;">
                            </a>
                            <a href="{{route('product.detail', $product->id)}}" title="" style="min-height: 50px;" class="product-name">{{$product->name}}</a>
                            <div class="price">
                                <span class="new">Giá: {{number_format($product->price,0,',','.')}}đ</span>

                            </div>
                            @if($product->stock > 0)
                            <div class="action clearfix" style="border-radius: 10px;">
                              
                                <button  style="margin-left: 37px; border-radius: 10px;" class="add-cart">Thêm giỏ hàng</button>
                            </div>
                            @endif
                        </li>
                        </form>
                        @endforeach
                    </ul>
                </div>
               
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        {{$products->links()}}
                    </ul>
                </div>
            </div>
        </div>
        <?php
        $categoriesBrands = [];

        foreach ($categories as $cate) {
            $cateBrands = [];

            foreach ($brands as $brand) {
                foreach ($cate_brands as $cate_brand) {
                    if ($cate_brand->category_id == $cate->id && $cate_brand->brand_id == $brand->id) {
                        $cateBrands[] = $brand; // Thêm thương hiệu vào mảng của danh mục
                    }
                }
            }

            $categoriesBrands[$cate->id] = $cateBrands;
        }
        ?>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">

                        @foreach($categories as $cate)
                        <li>

                            <a href="{{route('product',['cate'=> $cate->id])}}" title="">{{$cate->name}}</a>
                            @if (!empty($categoriesBrands[$cate->id]))
                            <ul class="sub-menu">
                                @foreach ($categoriesBrands[$cate->id] as $brand)
                                <li>
                                    <a href="{{route('product',['cate'=> $cate->id, 'brand'=> $brand])}} title="">{{ $brand->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <div class=" section" id="filter-product-wp">
                                        <div class="section-head">
                                            <h3 class="section-title">Bộ lọc</h3>
                                        </div>
                                        <div class="section-detail">
                                            <form  action="">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <td colspan="2">Giá</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><input  id="loc-500" type="radio" value="1"  name="search_price"  {{ request()->input('search_price') === '1' ? 'checked' : '' }}></td>
                                                            <td><label for="loc-500"  class="loc loc-500">Dưới 500.000đ</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" id="loc-2" value="2" name="search_price" {{ request()->input('search_price') === '2' ? 'checked' : '' }}></td>
                                                            <td> <label for="loc-2"  class="loc loc-2">500.000đ - 1.000.000đ</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" id="loc-3" value="3" name="search_price" {{ request()->input('search_price') === '3' ? 'checked' : '' }}></td>
                                                            <td><label for="loc-3"  class="loc loc-3">1.000.000đ - 5.000.000đ</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" id="loc-4" value="4" name="search_price" {{ request()->input('search_price') === '4' ? 'checked' : '' }}></td>
                                                            <td><label for="loc-4"  class="loc loc-4"> 5.000.000đ - 10.000.000đ</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" id="loc-5" value="5" name="search_price" {{ request()->input('search_price') === '5' ? 'checked' : '' }}></td>
                                                            <td><label for="loc-5"  class="loc loc-5">Trên 10.000.000đ</label></td>
                                                        </tr>

                                                    </tbody>

                                                </table>
                                                <button type="submit" style="width: 100px; border: none; color: white;  border-radius: 20px; background-color:#333333;">Lọc</button>

                                            </form>
                                        </div>
                </div>

            </div>
        </div>
    </div>
    @stop
  <style>
    .loc:hover{
        cursor: pointer;
    }
  </style>