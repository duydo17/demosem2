<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use App\Models\member;
use App\Models\product_thumbnail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailController;
use App\Mail\orderMail;
use RealRashid\SweetAlert\Facades\Aler;
class CartController extends Controller
{

    function show_cart()
    {
        return view('users.pages.showcart');
    }
    function add_cart(Request $request, $id)
    {       
        $product = Product::find($id);
        $qty = 1;
        if($request->input('num-order')){
            $qty = $request->input('num-order');
        }
        Cart::add([
            'id' =>   $product->id,
            'code' =>   $product->code,       
            
            'name' =>   $product ->name,
            'qty' => $qty,
            'price' =>   $product->price,
             'options' => ['thumbnail' => $product->product_thumbnail[0]->image]
        ]);
        return redirect()->back();
    }
    function remove_cart($rowId){
        Cart::remove($rowId);
        return redirect()->route('show.cart');
    }
    function destroy_cart(){
        Cart::destroy();
        return redirect()->route('show.cart');
    }
    function update_cart(Request $request){
        
        $data = $request->get('qty');
        foreach($data as $k =>$v){
            Cart::update($k,$v);
        }
        return redirect()->route('show.cart');
    }
    function checkout(Request $request){
       $id = $request->session()->get('id');
        $user = Member::find($id);
        return view('users.pages.checkout',compact('user'));
    }
    function cart_mail(){
        $products = Product::all();
        return view('mail.template', compact('products'));
    }
    function add_checkout(Request $request){
        $request->validate(
            [   'address' => 'required',
                'phone' => 'required|numeric|digits:10',  
                'payment-method'=>'required',                        
            ],
        [
            'required' => ':attribute không được để trống',
            'numeric' => ':arttribute phải là số',
            'digits' => ':attribute cần phải có chính xác :digits chữ số',
               
        ],[            
            'address'=>'địa chỉ',
            'phone'=>'số điện thoại',
            'payment-method'=>'Hình thức thanh toán',            
        ]);
        if(Cart::count()>0){
            $id = $request->session()->get('id');
            $user = Member::find($id);
            //add customer
            $customer = new Customer();
            $customer->fullname =  $user->fullname;
            $customer->email =  $user->email;
            $customer->address = $request->input('address');
            $customer->phone = $request->input('phone');
          
           $customer->save();
            //add order
            $order = new Order();
            $order->order_code = Str::random(10);
            $order->customer_id = $customer->id;
            $order->user_id = $user->id;
            $order->product_qty = Cart::count();
            $order->cart_total = Cart::total();
            $order->status = "đang đóng gói";
            $order->payment = $request->input('payment-method');
            $order->note = $request->input('note');
            $order->save();
    
            foreach(Cart::content() as $row){
                $orderdetail = new Orderdetail();
                $orderdetail->order_id = $order->id;
                $orderdetail->product_id = $row->id;
                $orderdetail->product_name = $row->name;
                $orderdetail->total_price = $row->total;
                $orderdetail->quantity = $row->qty;
                $orderdetail->save();
                $product = Product::find( $row->id);
                $product->stock= $product->stock - $row->qty;
                $product->save();            
    
            }
            $subject = "Xác Nhập Đặt Hàng Thành Công";
            $message = "Mã Đơn Hàng Của Bạn Là: ".$order->id;
            $request->session()->put('order_id',  $order->id);
            $request->session()->put('order_code',  $order->order_code);
            $request->session()->put('customer_address', $customer->address);
            $request->session()->put('payment', $order->payment);
            $request->session()->put('phone', $customer->phone);
            $request->session()->put('cart_total', $order->cart_total);
            $request->session()->put('cart', Cart::content());
            $request->session()->put('qty', $order->product_qty);
            
            Mail::to($user->email)
            ->send(new orderMail($subject,$message));
            Cart::destroy();
            session()->forget('order_id');
            session()->forget('order_code');
            session()->forget('customer_address');
            session()->forget('payment');
            session()->forget('phone');
            session()->forget('cart_total');
            session()->forget('cart');
            session()->forget('qty');
            return redirect()->route('home')->with('success','Đặt Hàng Thành Công');
        }else{
            return redirect()->route('home')->with('error','Chưa có sản phẩm trong giỏ hàng');
        }
      
        }
       
}
