@extends('admin.layouts.layout')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@section('content')
<div id="content" class="fl-right">
<div  style="display: block; margin-left: 300px; height: 363px; border-radius: thin solid;">
            <h1 style="font-size: 30px; font-weight: bold;"> Login</h2>
            <form action="{{route('login.user')}}" style="width: 300px;" method="post">
            @csrf
                <div class="mb-3 mt-3">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
</div>
@stop