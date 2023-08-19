<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\category;
use App\Models\slider;
use App\Models\product;
use App\Models\post;
use App\Models\member;
use App\Models\Order;
use App\Models\brand;
use App\Models\cate_brand;
use App\Models\Category_post;
use App\Models\checkcomment;
use App\Models\comment;
use App\Models\Orderdetail;
use App\Models\product_thumbnail;
use RealRashid\SweetAlert\Facades\Aler;
use Illuminate\Http\Request;

class IndexUserController extends Controller
{
    
    function home()
    {
        $bestSellingProducts = Orderdetail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(6)
            ->get();

        $sliders = DB::table('sliders')->orderby('id', 'desc')->limit(4)->get();
        $categories = Category::all();
        $products = Product::all();
        $brands = Brand::all();
        $cate_brands = Cate_brand::all();
        $product_thumbnail = Product_thumbnail::all();

        $newproducts = Product::orderby('id', 'desc')->limit(10)->get();


        return view('users.pages.home', compact('sliders', 'categories', 'products', 'newproducts', 'brands', 'cate_brands', 'product_thumbnail', 'bestSellingProducts'));
    }
    function product(Request $request)
{
    $cate_id = $request->query('cate');
    $brand_id = $request->query('brand');
    $select = $request->input('select');
    $search = $request->input('search');
    $search_cate = $request->input('search_cate');
    $search_price = $request->input('search_price');
    
    $products = Product::paginate(12); // Mặc định

    if ($request->has('cate') && $request->has('brand')) {
        $products = Product::where('category_id', $cate_id)
            ->where('brand_id', $brand_id)
            ->paginate(12);
    } elseif ($request->has('cate')) {
        $products = Product::where('category_id', $cate_id)->paginate(12);
    } elseif ($search_cate) {
        $query = Product::where('category_id', $search_cate);

        if ($select == 1) {
            $query->orderBy('name', 'desc');
        } elseif ($select == 2) {
            $query->orderBy('name', 'asc');
        } elseif ($select == 3) {
            $query->orderBy('price', 'desc');
        } elseif ($select == 4) {
            $query->orderBy('price', 'asc');
        }

        $products = $query->paginate(12);
    } elseif (!$search_cate) {
        $query = Product::query();

        if ($select == 1) {
            $query->orderBy('name', 'desc');
        } elseif ($select == 2) {
            $query->orderBy('name', 'asc');
        } elseif ($select == 3) {
            $query->orderBy('price', 'desc');
        } elseif ($select == 4) {
            $query->orderBy('price', 'asc');
        }

        $products = $query->paginate(12);
    } elseif ($search_price) {
        $query = Product::query();

        if ($search_price == 1) {
            $query->where('price', '<', 500000);
        } elseif ($search_price == 2) {
            $query->where('price', '>=', 500000)
                ->where('price', '<=', 1000000);
        } elseif ($search_price == 3) {
            $query->where('price', '>', 1000000)
                ->where('price', '<=', 5000000);
        } elseif ($search_price == 4) {
            $query->where('price', '>', 5000000)
                ->where('price', '<=', 10000000);
        } elseif ($search_price == 5) {
            $query->where('price', '>', 10000000);
        } elseif ($search) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $products = $query->paginate(12);
    }

    $brands = Brand::all();
    $cate_brands = Cate_brand::all();
    $categories = Category::all();
    return view('users.pages.product', compact('products', 'categories', 'brands', 'cate_brands'));
}

    function product_detail($id)
    {

        $brands = Brand::all();
        $cate_brands = Cate_brand::all();
        $categories = Category::all();
        $product = Product::find($id);
        $comments = Comment::all();
        $products = Product::all();
        $checks = Checkcomment::all();

        return view('users.pages.product_detail', compact('product', 'categories', 'brands', 'cate_brands', 'comments', 'products','checks'));
    }
    function add_comment(Request $request, $id)
    {

        $user_id = $request->session()->get('id');
        $user = Member::find($user_id);
        $email = $user->fullname;
        $content = $request->input('cmt');
        $product_id = $id;

        Comment::create(['email' => $email, 'content' => $content, 'product_id' => $product_id]);
        return redirect()->back();
    }
    function blog(Request $request)
    {
        $cate_id = $request->query('cate');
        if ($request->has('cate')) {
            $posts = Post::where('catepost_id', $cate_id)->paginate(5);
        } else {
            $posts = Post::paginate(10);
        }

        $cates = Category_post::all();
        return view('users.pages.blog', compact('posts', 'cates'));
    }
    function blog_detail($id)
    {
        $post = Post::find($id);
        $bestSellingProducts = Orderdetail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(6)
            ->get();
        $products = Product::all();
        return view('users.pages.blog_detail', compact('post', 'bestSellingProducts', 'products'));
    }
    function info($id)
    {
        $user = Member::find($id);
        return view('users.pages.info_account', compact('user'));
    }
    function update_user(Request $request, $id)
    {
        $user = Member::find($id);
        $request->validate(
            [
                'fullname' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric|digits:10',
                'gender' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
                'numeric' => ':arttribute phải là số',
                'digits' => ':attribute cần phải có chính xác :digits số',

            ],
            [
                'fullname' => 'họ và tên',
                'address' => 'địa chỉ',
                'phone' => 'số điện thoại',
                'username' => 'tên đăng nhập',
                'gender' => 'giới tính',

            ]
        );
        $user->fullname = $request->input('fullname');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->save();
        return redirect()->route('home')->with('success', 'Update Khoản Thành Công');
    }
    function change_password($id)
    {
        $user = Member::find($id);
        return view('users.pages.change_password', compact('user'));
    }
    function update_password(Request $request, $id)
    {
        $request->validate(
            [
                'password_old' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',

            ],
            [
                'required' =>  ':attribute không được bỏ trống',
                'confirmed' =>  'Xác Nhận Mật Khẩu Không Trùng Khớp',
            ],
            [
                'password_old' => 'Mật Khẩu Cũ',
                'password' => 'Mật Khẩu Mới',
                'password_confirmation' => 'Xác Nhận Mật Khẩu',
            ]
        );
        $user = Member::find($id);
        $old_pass = $request->input('password_old');
        if (($user->password) == $old_pass) {
            $user->password = $request->input('password');
            $user->save();
            return redirect()->route('home')->with('success', 'Đổi Mật Khẩu Thành Công');
        }
        return redirect()->back()->with('error', 'Mật khẩu Cũ không trùng khớp');
       
    }
    function history($id)
    {
        $orders = Order::where('user_id', $id)->get();
        $users = Member::all();
        return view('users.pages.order_history', compact('orders', 'users'));
    }
    function history_detail($id)
    {
        $orders = Order::with('customer')->find($id);
        $order = Order::find($id);
        $products = Product::all();
        return view('users.pages.order_history_detail', compact('order', 'orders', 'products'));
    }
    function delete_history($id)
    {
        $order = Order::find($id);
        if ($order->status == "đang đóng gói") {
            $orders = Orderdetail::where('order_id', $id)->get();
            foreach ($orders as $o) {
                $product = Product::find($o->product_id);
                $product->stock = $product->stock + $o->quantity;
                $product->save();                
            } 
            $order->delete();
                return redirect()->back()->with('success', 'Xóa Đơn Hàng Thành Công');
        }
       
            return redirect()->back()->with('error', 'đơn hàng đang giao hoặc đã giao thành công không được hủy');
    }
    function contact(){
        $bestSellingProducts = Orderdetail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(6)
            ->get();
            $products = Product::all();
        return view('users.pages.contact',compact('bestSellingProducts','products'));
    }
}
