@extends('admin.layouts.layout')
@section('content')

<style>
    label {
        margin-right: 10px;
        width: 170px;
        font-weight: bold;

    }
.text-danger{
        color: red;
    }

</style>
<div id="content" class="fl-right">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
        </div>
    </div>
    <div class="section" id="detail-page">
        <div class="section-detail">
            <form action="{{route('add.product')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div style="width: 500px; display: flex;">
                    <label for="name">Tên sản phẩm:</label>
                    <input style="flex: 1;" type="text" name="name" id="name">
                    
                </div>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="code">Mã sản phẩm:</label>
                    <input style="flex: 1;" type="text" name="code" id="code">
                    
                </div>
                @error('code')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="stock">Số Lượng:</label>
                    <input style="flex: 1;" type="number" min=1 max=10000 name="stock" id="stock">
                   
                </div>
                @error('stock')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="price">Giá sản phẩm:</label>
                    <input style="flex: 1;" type="text" name="price" id="price">
                   
                </div>
                @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div >
                    <label for="config">Mô tả ngắn:</label>
                    <textarea style="flex: 1;" name="config" id="config" class="ckeditor"></textarea>
                    
                </div>
                @error('config')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div>
                    <label for="description">Chi tiết:</label>
                    <textarea name="description" id="description" class="ckeditor"></textarea>
                   
                </div>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
</br>
                <label>Hình ảnh</label>
                <div id="uploadFile">
                    <input type="file" name="file[]" id="file" multiple>                
                   
                </div>
                <div style="width: 500px; display: flex;">
                    <label>Danh mục sản phẩm:</label>
                    <select name="category">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($cates as $cate)
                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                       
                    </select>
                   
                </div>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror</br>
                <div style="width: 500px; display: flex;">
                <label>Thương Hiệu:</label>
                <select name="brand">
                <option value="">-- Chọn danh mục --</option>
                    @foreach($brands as $brand)                    
                    <option value="{{$brand->id}}">{{$brand->name}}</option>                    
                    @endforeach
                </select>
               
                </div>
                @error('brand_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror</br>
                
                <button type="submit" class="btn btn-success" style="color: white;" name="btn-submit" id="btn-submit">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@stop