<?php
namespace App;

class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanlity = 0;

    public function __constant($cart){
       if(cart){
           $this-$products = $cart->products;
           $this-$totalPrice = $cart->totalPrice;
           $this-$totalQuanlity = $cart->totalQuanlity;
       }
    }

    public function addCart($product, $id){
        $newProduct = ['quanlity' => 0,'price' => $product->price ,'productInfo' => $product];
        if($this->products){
            if(array_key_exists($id, $products)) {
             $newProduct = $products[$id];
            }
            
        }
        $newProduct['quanlity']++;
        $newProduct['price'] =  $newProduct['quanlity'] * $product->price;
        $this->$products[$id] = $newProduct;
        $this->$totalPrice += $product->price;
        $this->$totalQuanlity++;

    }
}

?>