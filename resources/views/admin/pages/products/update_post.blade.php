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
            <h3 id="index" class="fl-left">Thêm Bài Viết</h3>
        </div>
    </div>
    <div class="section" id="detail-page">
        <div class="section-detail">
            <form action="{{route('edit.post',$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="width: 500px; display: flex;">
                    <label for="title">Tiêu Đề Bài Viết:</label>
                    <input style="flex: 1;" type="text" value="{{$post->title}}" name="title" id="title">
                </div>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div>
                    <label for="short_desc">Mô tả ngắn:</label>
                    <textarea style="flex: 1;" name="short_desc" id="short_desc" class="ckeditor">{{$post->short_desc}}</textarea>
                </div>
                @error('short_desc')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <div>
                    <label for="post_detail">Chi tiết:</label>
                    <textarea name="post_detail" id="post_detail" class="ckeditor">{{$post->post_detail}}</textarea>

                </div>
                @error('post_detail')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </br>
                <label>Hình ảnh</label>
                <div id="uploadFile">
                    <input type="file" name="file" id="file" >

                </div>
                <div style="width: 500px; display: flex;">
                    <label>Danh mục sản phẩm:</label>
                    <select name="cate_post">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($cate_posts as $cate)
                        <option value="{{$cate->id}}"{{old('cate_post',$post->catepost_id)==$cate->id ? 'selected' : ''}}>{{$cate->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('cate_post')
                <span class="text-danger">{{ $message }}</span>
                @enderror</br>
                <button type="submit" class="btn btn-success" style="color: white;" name="btn-submit" id="btn-submit">Sửa Bài Viết</button>
            </form>
        </div>
    </div>
</div>
@stop