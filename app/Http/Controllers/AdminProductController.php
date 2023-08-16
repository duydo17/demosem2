<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\brand;
use App\Models\Category_post;
use App\Models\checkcomment;
use App\Models\product;
use App\Models\User;
use App\Models\slider;
use App\Models\comment;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Post;
use App\Models\product_thumbnail;
use App\Models\Shipper;
use App\Models\member;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Aler;


class AdminProductController extends Controller
{
    //post
    public function index(Request $request)
    {
        $keyword = "";
        if($request->input('keyword'))
        {
           $keyword = $request->input('keyword');
        }
        $posts = Post::where('title','LIKE',"%{$keyword}%")->paginate(10);
        $users = Member::all();
        $cate_posts = Category_post::all();
        return view('admin.pages.products.list_post', compact('posts', 'users', 'cate_posts'));
    }

    function create_post()
    {
        $cate_posts = Category_post::all();
        return view('admin.pages.products.create_post', compact('cate_posts'));
    }
    function add_post(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'post_detail' => 'required',
            'cate_post' => 'required',
            'file.*' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg,webp,heic|max:2048',
        ], [
            'required'=>  ':attribute không được bỏ trống',
        ], [
            'title' => 'Tiêu Đề',
            'short_desc' => 'Mô tả ngắn',
            'post_detail' => 'Chi Tiết',
            'cate_post' => 'Danh mục bài viết',
            'file.*' => 'Hình ảnh',
        ]);
        $post = new Post();
        $post->title = $request->input('title');
        $post->short_desc = $request->input('short_desc');
        $post->post_detail = $request->input('post_detail');
        $post->catepost_id = $request->input('cate_post');
        $user_id = $request->session()->get('id');
        $post->user_id = $user_id;
        if ($request->hasFile('file')) {
            $imageName = time() . '.' . $request->file->getClientOriginalName();
            $post->thumbnail = $imageName;
            $request->file->move(public_path('uploads/'), $imageName);
        }
        $post->save();
        return redirect()->route('admin.index')->with('success', 'Thêm Bài Viết Thành Công');
    }
    function delete_post($id)
    {
        $post = Post::find($id)->delete();
        return redirect()->route('admin.index')->with('success', 'Xóa Bài Viết Thành Công');
    }
    function update_post($id){
        $post = Post::find($id);
        $cate_posts = Category_post::all();
        return view('admin.pages.products.update_post',compact('post','cate_posts'));
    }
    function edit_post(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'post_detail' => 'required',
            'cate_post' => 'required',
            'file.*' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg,webp,heic|max:2048',
        ], [
            'required'=>  ':attribute không được bỏ trống',
        ], [
            'title' => 'Tiêu Đề',
            'short_desc' => 'Mô tả ngắn',
            'post_detail' => 'Chi Tiết',
            'cate_post' => 'Danh mục bài viết',
            'file.*' => 'Hình ảnh',
        ]);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->short_desc = $request->input('short_desc');
        $post->post_detail = $request->input('post_detail');
        $post->catepost_id = $request->input('cate_post');
        $user_id = $request->session()->get('id');
        $post->user_id = $user_id;
        if($request->hasFile('file')){
            $existingImage = public_path('uploads/'.$post->thumbnail);
            if(File::exists($existingImage)){
                File::delete($existingImage);
            }
            $imageName = time() . '.' . $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $imageName);
            $post->thumbnail = $imageName;
        }
        $post->save();
        return redirect()->route('admin.index')->with('success', 'Sửa Bài Viết Thành Công');
    }
    function create_cate_post()
    {
        return view('admin.pages.products.create_cate_post');
    }
    function add_cate_post(Request $request)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'required'=>  ':attribute không được bỏ trống',
            ],
            [
                'name' => 'Tên Danh Mục'
            ]
        );
        $user_id = $request->session()->get('id');
        $name = $request->input('name');
        $cate_post = new Category_post();
        $cate_post->name = $name;
        $cate_post->user_id = $user_id;
        $cate_post->save();
        return redirect()->route('list.cate.post')->with('success', 'Thêm Danh Mục Bài Viết Thành Công');
    }
    function list_cate_post(Request $request)
    {
        $keyword = "";
        if($request->input('keyword'))
        {
           $keyword = $request->input('keyword');
        }
        $cate_posts = Category_post::where('name','LIKE',"%{$keyword}%")->paginate(10);
        $users = Member::all();
        return view('admin.pages.products.list_cate_post', compact('cate_posts', 'users'));
    }
    function delete_cate_post($id)
    {
        $cate_post = Category_post::find($id);
        $cate_post->delete();
        return redirect()->route('list.cate.post')->with('success', 'Xóa Danh Mục Bài Viết Thành Công');
    }


    //Start CATEGORY
    function list_category(Request $request)
    {
        $keyword = "";
        if($request->input('keyword'))
        {
           $keyword = $request->input('keyword');
        }
        $categories = Category::where('name','LIKE',"%{$keyword}%")->paginate(10);
        $users = Member::all();
        return view('admin.pages.products.list_category', compact('categories', 'users'));
    }
    function create_category()
    {
        return view('admin.pages.products.create_category');
    }
    function add_category(Request $request)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'required'=>  ':attribute không được bỏ trống',
            ],
            [
                'name' => 'Tên Danh Mục'
            ]
        );
        $name = $request->input('name');
        $user_id = $request->session()->get('id');


        Category::create(['name' => $name, 'user_id' => $user_id]);
        return redirect()->route('list.category')->with('success', 'Thêm Danh Mục Thành Công');;
    }
    function delete_category($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return redirect()->route('list.category');
    }

    // Start Brand

    function list_brand(Request $request)
    {
        $keyword = "";
        if($request->input('keyword'))
        {
           $keyword = $request->input('keyword');
        }
        $brands = Brand::where('name','LIKE',"%{$keyword}%")->paginate(5);
        $users = Member::all();
        return view('admin.pages.products.list_brand', compact('brands', 'users'));
    }
    function create_brand()
    {
        return view('admin.pages.products.create_brand');
    }
    function add_brand(Request $request)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
              'required'=>  ':attribute không được bỏ trống',
            ],
            [
                'name' => 'Tên Thương Hiệu'
            ]
        );
        $name = $request->input('name');
        $user_id = $request->session()->get('id');
        Brand::create(['name' => $name, 'user_id' => $user_id]);
        return redirect()->route('list.brand')->with('success', 'Thêm Thương Hiệu Thành Công');
    }
    function delete_brand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('list.brand');
    }

    //start Product
    function list_product(Request $request)
    {  
        $keyword = "";
        if($request->input('keyword'))
        {
           $keyword = $request->input('keyword');
        }
        $products = Product::where('name','LIKE',"%{$keyword}%")->paginate(6);
        $users = Member::all();
        $cates = Category::all();
        $brands = Brand::all();
        return view('admin.pages.products.list_product', compact('products', 'users', 'cates', 'brands'));
    }
    function create_product()
    {
        $cates = Category::all();
        $brands = Brand::all();
        return view('admin.pages.products.create_product', compact('cates', 'brands'));
    }
    function add_product(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'code' => 'required',
                'stock' => 'required',
                'price' => 'required|numeric',
                'description' => 'required',
                'config' => 'required',
                'file.*' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg,webp,heic|max:2048',

            ],
            [
                'required'=>  ':attribute không được bỏ trống',
                'numeric' => ':attribute phải là số'
            ],
            [
                'name' => 'Tên sản phẩm',
                'code' => 'Mã sản phẩm',
                'stock' => 'Số lượng',
                'price' => 'Giá',
                'description' => 'Chi tiết',
                'config' => 'Mô tả ngắn',

            ]
        );
        $product = new Product();
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->config = $request->input('config');
        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->user_id = $request->session()->get('id');
        $product->save();

        if ($request->hasFile("file")) {
            foreach ($request->file("file") as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path("uploads");
                $image->move($destinationPath, $filename);
                $imagePath = "uploads/" . $filename;
                $product_thumbnail = new Product_thumbnail();
                $product_thumbnail->image = $imagePath;
                $product_thumbnail->product_id = $product->id;
                $product_thumbnail->save();
            }
        }
        return redirect()->route('list.product')->with('success', 'Thêm Sản Phẩm Thành Công');
    }
    function delete_product($id)
    {
        $product = Product::find($id);
        if ($product->product_thumbnail->count() > 0) {
            foreach ($product->product_thumbnail as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
                $image->delete();
            }
        }
        $product->delete();
        return redirect()->route('list.product')->with('success', 'Xóa Sản Phẩm Thành Công');
    }
    function update_product($id)
    {
        $product = Product::find($id);
        $cates = Category::all();
        $brands = Brand::all();
        return view('admin.pages.products.update_product', compact('product', 'cates', 'brands'));
    }
    function edit_product(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'code' => 'required',
                'stock' => 'required',
                'price' => 'required|numeric',
                'description' => 'required',
                'config' => 'required',
                'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,heic|max:2048',

            ],
            [
                'required' => ':attribute không được để trống',
                'numeric' => ':arttribute phải là số'
            ],
            [
                'name' => 'Tên sản phẩm',
                'code' => 'Mã sản phẩm',
                'stock' => 'Số lượng',
                'price' => 'Giá',
                'description' => 'Chi tiết',
                'config' => 'Mô tả ngắn',
                'file' => 'hình ảnh',

            ]
        );

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->code = $request->input('code');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->config = $request->input('config');
        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->user_id = $request->session()->get('id');
        $product->save();
        if ($request->hasFile("file")) {
            //delete old images if they existed
            if ($product->product_thumbnail->count() > 0) {
                foreach ($product->product_thumbnail as $image) {
                    if (File::exists($image->image)) {
                        File::delete($image->image);
                    }
                    $image->delete();
                }
            }
            foreach ($request->file("file") as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path("uploads");
                $image->move($destinationPath, $filename);
                $imagePath = "uploads/" . $filename;
                $newImage = new Product_thumbnail();
                $newImage->image = $imagePath;
                $newImage->product_id = $product->id;
                $newImage->save();
            }
        }



        return redirect()->route('list.product')->with('success', 'Update Sản Phẩm Thành Công');
    }

    //slider
    function list_slider(Request $request)
    {
        $keyword = "";
        if($request->input('keyword'))
        {
           $keyword = $request->input('keyword');
        }
        $users = Member::all();
        $sliders = Slider::where('name','LIKE',"%{$keyword}%")->paginate(5);
        return view('admin.pages.slider.list', compact('sliders', 'users'));
    }
    function create_slider()
    {
        return view('admin.pages.slider.create');
    }
    function add_slider(Request $request)
    {   $request->validate([
        'name'=>'required',
        'file.*' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg,webp,heic|max:2048',
        
    ],[
        'required' => ':attribute không được để trống',
    ],[
        'name' => 'Tên slider',
        'file' => 'hình ảnh',
    ]);
        $user_id = $request->session()->get('id');
        $name = $request->input('name');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move('sliders', $filename);
            $thumbnail = $filename;
        }

        Slider::create(['name' => $name, 'thumbnail' => $thumbnail, 'user_id' => $user_id]);
        return redirect()->route('list.slider')->with('success', 'Thêm Slide Thành Công');
    }
    function delete_slider($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('list.slider')->with('success', 'Xóa Slide Thành Công');
    }
    //comment
    function list_comment()
    {
        $products = Product::all();
        $comments = Comment::all();
        $checks = Checkcomment::all();
        return view('admin.pages.products.list_comment', compact('comments', 'products','checks'));
    }
    function delete_comment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('list.comment')->with('success', 'Xóa Ý Kiến Thành Công');
    }
    function order_list(Request $request)
    {
        $keyword = "";
        if($request->input('keyword'))
        {
           $keyword = $request->input('keyword');
        }
        $orders = Order::where('order_code','LIKE',"%{$keyword}%")->paginate(10);
        $customers = Customer::all();
        return view('admin.pages.orders.list', compact('orders', 'customers'));
    }
    function customer_list(Request $request)
    {
        $keyword = "";
        if($request->input('keyword'))
        {
           $keyword = $request->input('keyword');
        }
        $customers = Member::where('fullname','LIKE',"%{$keyword}%")->paginate(10);
        return view('admin.pages.orders.customer_list', compact('customers'));
    }
    function update_customer($id){
        $user = Member::find($id);
        return view('admin.pages.orders.update_customer',compact('user'));
    }
    function edit_customer(Request $request, $id){
        $request->validate(
            [
                'fullname' => 'required',
                
                'address' => 'required',
                'phone' => 'required|numeric',               
                'gender' => 'required',
                'password' => 'required',
                          

            ],
        [
            'required' => ':attribute không được để trống',
            'numeric' => ':arttribute phải là số',
            'max' => ':arttribute có max số',
            'min' => ':arttribute có min số',
            'unique' => ':arttribute Đã dược đăng ký',
                 
        ],[
            'fullname'=>'họ và tên',
            
            'address'=>'địa chỉ',
            'phone'=>'số điện thoại',
           
            'password'=>'mật khẩu',
            'gender'=>'giới tính',
            
        ]);

        $user = Member::find($id);
        $user->fullname = $request->input('fullname');       
        $user->password = $request->input('password');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->role =  $request->input('role');
        $user->save();
        return redirect()->route('list.customer')->with('success', 'Update Khoản Thành Công');

    }
    function delete_customer($id){
        $user = Member::find($id)->delete();
        return redirect()->back()->with('success','Xóa Thành Viên Thành Công');
    }
    function order_detail($id)
    {
        $orders = Order::with('customer')->find($id);
        $order = Order::find($id);
        $products = Product::all();
        
        $shipper = Shipper::where('order_id', $order->id)->first();
        $users = User::all();
        return view('admin.pages.orders.order_detail', compact('orders', 'order', 'products','shipper','users'));
    }
    function delete_order($id)
    { 
         $orders = Orderdetail::where('order_id',$id)->get();      
        foreach($orders as $o){
        $product = Product::find($o->product_id);
       $product->stock= $product->stock + $o->quantity;
       
       $product->save();  
    }
        $order = Order::find($id);
        $order->delete();
       
       
       return redirect()->back()->with('success','Xóa Đơn Hàng Thành Công');
    }
    function edit_status_order(Request $request,$id){
        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->save();
        return redirect()->back()->with('success','Cập Nhật Tình Trạng Thành Công');
    }
    function list_shipper(Request $request){

        $keyword = "";
        if($request->input('keyword'))
        {
           $keyword = $request->input('keyword');
        }
        $orders = Order::where('order_code','LIKE',"%{$keyword}%")->paginate(10);
        $customers = Customer::all();
        return view('admin.pages.shipper.list',compact('orders','customers'));
    }
    function update_shipper($id){
        $order = Order::find($id);
        return view('admin.pages.shipper.update',compact('order'));
    }
    function edit_shipper(Request $request,$id){
        
        $user_id = $request->session()->get('id');
        $order = Order::find($id);
        $order->status = $request->input('status');
        $shipper = new Shipper();
        $shipper->note = $request->input('note');
        $shipper->user_id = $user_id;
        $shipper->order_id = $order->id;
        if ($request->hasFile('file')) {
            $imageName = time() . '.' . $request->file->getClientOriginalName();
            $shipper->thumbnail = $imageName;
            $request->file->move(public_path('shipper/'), $imageName);
        }
        $order->save();
        $shipper->save();
        return redirect()->route('list.shipper')->with('success','cập nhật giao hành thành công');
    }
}
