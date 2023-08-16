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
            <h3 id="index" class="fl-left">Thêm Slider</h3>
        </div>
    </div>
    <div class="section" id="detail-page">
        <div class="section-detail">
            <form method="POST" action="{{route('add.slider')}}" enctype="multipart/form-data">
                @csrf
                <div style="width: 400px; display: flex;">
                    <label for="name">Tên slider: </label>
                    <input type="text" style="flex: 1;" name="name" id="name">
                  
                </div>
                @error('name')
                <span class="text-danger" style="color: red;">{{ $message }}</span>
                @enderror
                <br>

                <label>Hình ảnh</label>
                <div id="uploadFile">
                    <input type="file" name="file" id="file">
                  
                    @error('file.*')
                <span class="text-danger" style="color: red;">{{ $message }}</span>
                @enderror
                </div>

                <button type="submit" name="btn-submit" class="btn btn-success" id="btn-submit">Thêm Slider</button>
            </form>
        </div>
    </div>
</div>
@stop