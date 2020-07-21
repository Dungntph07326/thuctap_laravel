<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Session;
use App\CartHelper;

class CartController extends Controller
{
    public function view(){
        return view (frontend.shoping-cart);
    }
  public function add(CartHelper $cart,$id){
     $product = Product::find($id);

     $cart->add($product);
     return redirect()->back();
     
  } 
  public function remove(CartHelper $cart,$id){
    $cart->remove($id);
    return redirect()->back(); 
 } 
 public function update(CartHelper $cart,$id,$quantity){
    $cart->update($id);
    return redirect()->back(); 
 } 
 public function clear(CartHelper $cart){
    $cart->update($id);
    return redirect()->back(); 
 } 
    

    
}
