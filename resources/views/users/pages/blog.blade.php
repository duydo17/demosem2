@extends('users.layouts.layout')
@section('content')
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <!-- <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul> -->
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Tin Tức</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($posts as $post)
                        <li class="clearfix">
                            <a href="{{route('blog.detail', $post->id)}}" title="" class="thumb fl-left">
                                <img src="{{asset('uploads/'.$post->thumbnail)}}" style="width: 100%; " alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="{{route('blog.detail', $post->id)}}" title="" class="title">
                                    <h2 style="font-weight: bold; font-size: 25px;"> {{$post->title}}</h2>
                                </a>
                                <span class="create-date" style="font-size: 10px;">{{$post->created_at}}</span>
                                <p class="desc">{!! $post->short_desc !!}</p>
                            </div>
                        </li>
                        <hr>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        {{$posts->links()}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh Mục Tin Tức</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        @foreach($cates as $cate)
                        <li style="border-bottom: 1px solid #eee;">
                            <a href="{{route('blog',['cate'=> $cate->id])}}" style="font-size: 18px; color: #333; " title="">{{$cate->name}}</a>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
<style>
    .list-item li:hover{
        background-color: #dee2e6;
    }
</style>