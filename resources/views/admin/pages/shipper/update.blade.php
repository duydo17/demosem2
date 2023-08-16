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
            <h3 id="index" class="fl-left">Giao Hàng</h3>
        </div>
    </div>
    <div class="section" id="detail-page">
        <div class="section-detail">
            <form action="{{route('edit.shipper',$order->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div style="width: 500px; display: flex;">
                    <label for="name">Mã đơn hàng:</label>
                    <input style="flex: 1;" value="{{$order->order_code}}" disabled type="text" name="name" id="name">               
                </div>    
                <br>       
                <div style="width: 500px; display: flex;">
                    <label for="note">Ghi Chú</label>
                    <textarea style="flex: 1;"  name="note" rows="3" id="config"></textarea>
                    @error('note')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div></br>    
               
                <div id="file" style="width: 500px; display: flex;">
                <label>Hình ảnh Giao Hàng</label>
                    <input type="file" name="file" multiple  id="file">                
                    @error('file')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div> </br>
               
                <div style="width: 500px; display: flex;">
                    <label>Tình Trạng Đơn Hàng</label>
                    <select name="status" id="category">                          
                     <option value="đang vận chuyển" {{old('status',$order->status)== 'đang vận chuyển' ? 'selected' : ''}}>Đang Vận Chuyển</option>                  
                         
                     <option value="hủy đơn hàng" {{old('status',$order->status)== 'hủy đơn hàng' ? 'selected' : ''}}>Hủy Đơn Hàng</option>                   
                     <option value="giao thành công" {{old('status',$order->status)== 'giao thành công' ? 'selected' : ''}}>Giao Hàng Thành Công</option>                     
                    </select>
                </div></br>
                
                <button type="submit" class="btn btn-success" style="color: white;" name="btn-submit" id="btn-submit">Giao Hàng</button>
            </form>
        </div>
    </div>
</div>
@stop