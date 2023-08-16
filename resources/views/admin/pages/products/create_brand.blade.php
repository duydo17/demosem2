@extends('admin.layouts.layout')
<style>
.text-danger{
        color: red;
    }
</style>

@section('content')
<div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" acction="{{ route('add.brand') }}">
                    @csrf
                        <label for="name">Tên Thương Hiệu</label>
                        <input type="text" name="name" id="name">                       
                       
                        <button type="submit" name="btn-submit" id="btn-submit">Thêm Thương Hiệu</button>
                        @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                    </form>
                </div>
            </div>
        </div>
@stop
