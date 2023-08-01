@extends('admin.layouts.layout')
<link rel="stylesheet" href="{{asset('admin/css/import/add_cat.css')}}">
<style>
    label {
        width: 100px;
        font-weight: bold;
    }
</style>
@section('content')
<div id="content" class="fl-right">
    <div class="section" id="title-page">
        <div class="clearfix">
            <h3 id="index" class="fl-left">Thêm Hình Ảnh</h3>
        </div>
    </div>
    <div class="section" id="detail-page">
        <div class="section-detail">
        @if (session('success'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{session('success')}}
                </div>
                @endif
            <form method="POST" action="{{route('add.image')}}" enctype="multipart/form-data">
                @csrf
                <div style="width: 500px; display: flex;">
                    <label>Hình ảnh</label>
                    <input type="file" name="file[]" multiple accept="image/*" id="file">

                </div>
                </br>
                <div style="width: 500px; display: flex;">
                    <label>Sản Phẩm:</label>
                    <select name="product_id">
                        <option value="">-- Chọn sản phẩm --</option>
                        @foreach($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                </br>

                <button type="submit" name="btn-submit" class="btn btn-success" id="btn-submit">Thêm Slider</button>
            </form>
        </div>
    </div>
</div>
@stop