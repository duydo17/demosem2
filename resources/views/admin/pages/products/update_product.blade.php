@extends('admin.layouts.layout')
@section('content')
<style>
    label {
        margin-right: 10px;
        width: 150px;
        font-weight: bold;
    }
    
.text-danger{
        color: red;
    }

</style>
<div id="content" class="fl-right">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Cập Nhật sản phẩm</h3>
        </div>
    </div>
    <div class="section" id="detail-page">
        <div class="section-detail">
            <form action="{{route('edit.product',$product->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div style="width: 500px; display: flex;">
                    <label for="name">Tên sản phẩm:</label>
                    <input style="flex: 1;" value="{{$product->name}}" type="text" name="name" id="name">
                    @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="code">Mã sản phẩm</label>
                    <input style="flex: 1;" value="{{$product->code}}" type="text" name="code" id="code">
                    @error('code')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="stock">Số Lượng</label>
                    <input style="flex: 1;" value="{{$product->stock}}" type="number" min=1 max=10000 name="stock" id="stock">
                    @error('stock')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                </br>
                <div style="width: 500px; display: flex;">
                    <label for="price">Giá sản phẩm</label>
                    <input style="flex: 1;" value="{{$product->price}}" type="text" name="price" id="price">
                    @error('price')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                </br>
                <div >
                    <label for="config">Mô tả ngắn</label>
                    <textarea style="flex: 1;"  name="config" id="config"  class="ckeditor">{{$product->config}}</textarea>
                    @error('config')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                </br>
                <div>
                    <label for="description">Chi tiết</label>
                    <textarea name="description"  id="description" class="ckeditor">{{$product->description}} </textarea>
                    @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>

                <label>Hình ảnh</label>
                <div id="file">
                    <input type="file" name="file[]" multiple  id="file">                
                    @error('file')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                <div style="width: 500px; display: flex;">
                    <label>Danh mục sản phẩm</label>
                    <select name="category" id="category">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($cates as $cate)
                        <option value="{{$cate->id}}"{{old('category',$product->category_id)==$cate->id ? 'selected' : ''}}>{{$cate->name}}</option>
                        @endforeach
                       
                    </select>

                </div></br>
                <div style="width: 500px; display: flex;">
                <label>Thương Hiệu</label>
                <select name="brand" id="brand">
                <option value="">-- Chọn danh mục --</option>
                    @foreach($brands as $brand)                    
                    <option value="{{$brand->id}}"{{old('brand',$product->brand_id)==$brand->id ? 'selected' : ''}}>{{$brand->name}}</option>                    
                    @endforeach
                </select>
                </div></br>
                
                <button type="submit" class="btn btn-success" style="color: white;" name="btn-submit" id="btn-submit">Cập Nhật Sản Phẩm</button>
            </form>
        </div>
    </div>
</div>
@stop