<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
session_start();


class CartController extends Controller
{
    public function save_cart(Request $request){
        $productID = $request ->productid_hidden;
        $quantity = $request ->qty;

        $product_infor = DB::table('tbl_product')->where('product_id',$productID)->first();
        
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $product_infor->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_infor->product_name;
        $data['price'] = $product_infor->product_price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_infor->product_image;
        Cart::add($data);
        Cart::setGlobalTax(10);
        //Cart::destroy();
        return Redirect::to('/show-cart');
        
    }
    public function show_cart(){
         $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}


