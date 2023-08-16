@extends('admin.layouts.layout')

@section('content')

<style>
    label {
        margin-right: 10px;
        width: 170px;
        font-weight: bold;
    }
</style>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách bài viết</h3>
                    <a href="{{route('create.post')}}" title="" id="add-new" class="fl-left">Thêm mới</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        
                    <form action="#" class="form-s fl-right">
                    <input type="text" name="keyword" id="keyword" value="{{request()->input('keyword')}}">
                    <input type="submit" name="btn_search" value="Tìm kiếm">
                </form>
                    </div>
                    
                    <div class="table-responsive">
                    @if (session('success'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{session('success')}}
                </div>
                @endif
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                </tr>
                            </thead>
                            <tbody>@php
                                $t=1
                                @endphp
                                @foreach($posts as $post)
                                <tr>
                                    
                                    <td><span class="tbody-text">{{$t++}}</h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">{{$post->title}}</a>
                                        </div>
                                        <ul class="list-operation fl-right">
                                            <li><a href="{{route('update.post',$post->id)}}" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                                            <li><a href="{{route('delete.post',$post->id)}}" onclick="return confirm('bạn muốn xóa bài viết này?')" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </td>
                                    @foreach($cate_posts as $cate)
                                    @if($post->catepost_id == $cate->id)
                                    <td><span class="tbody-text">{{$cate->name}}</span></td>
                                   @endif
                                   @endforeach
                                   @foreach($users as $user)
                                    @if($post->user_id == $user->id)
                                    <td><span class="tbody-text">{{$user->username}}</span></td>
                                    @endif
                                   @endforeach
                                    <td><span class="tbody-text">{{$post->created_at}}</span></td>
                                </tr>
                               @endforeach
                            </tbody>
                            
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    <ul id="list-paging" class="fl-right">
                        {{$posts->links()}}
                    </ul>
                </div>
            </div>
        </div>



@stop