<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\product_thumbnail;

class CartController extends Controller
{

    function show_cart()
    {
        return view('users.pages.showcart');
    }
    function add_cart(Request $request, $id)
    {
       
        $product = Product::find($id);
        
        Cart::add([
            'id' =>   $product->id,
            'code' =>   $product->code,       
            
            'name' =>   $product ->name,
            'qty' => 1,
            'price' =>   $product->price,
             'options' => ['thumbnail' => $product->product_thumbnail[0]->image]
        ]);
        return redirect()->route('show.cart');
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
    function checkout(){
        return view('users.pages.checkout');
    }
    function add_checkout(Request $request){
        $request->validate(
            [
                'fullname' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric|max:11|min:10',
                          

            ],
        [
            'required' => ':attribute không được để trống',
            'numeric' => ':arttribute phải là số',
            'max' => ':arttribute có tối đa 11 ký tự ',       
            'min'=>':arttribute có tối thiểu 10 ký tự '        
        ],[
            'fullname'=>'họ và tên',
            'email'=>'email',
            'address'=>'địa chỉ',
            'phone'=>'số điện thoại',
            
        ]);
        //add customer
        $customer = new Customer();
        $customer->fullname = $request->input('fullname');
        $customer->email = $request->input('email');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->note = $request->input('note');
       $customer->save();
        //add order
        $order = new Order();
        $order->order_code = Str::random(10);
        $order->customer_id = $customer->id;
        $order->product_qty = Cart::count();
        $order->cart_total = Cart::total();
        $order->status = "Đang xử lý";
        $order->payment = $request->input('payment-method');
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
        Cart::destroy();
        return redirect()->route('home');
    }
}
