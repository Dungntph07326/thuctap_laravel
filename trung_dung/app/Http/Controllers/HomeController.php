<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Cookie; 
use App\Category;
use App\Product;
use DB;
use Illuminate\Http\Request;
use App\Cart;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
          // $this->middleware('auth');
       
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('index');
      }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function home() 
    {
        $categories = Category::all();
        $products = Product::paginate(8);
        $product1 = Product::paginate(3);
        $product2 = Product::where('price','>=', 100000)->paginate(3);
        return view('frontend.index',[
            'cates'=>$categories,
            'product'=> $products,
            'product1' => $product1,
            'product2' => $product2
        ]);
    }
    public function shopgrid(Request $request){
        $request = isset($_GET['id']) ? $_GET['id'] : null;
        
        if(!$request){
            return redirect()->route('pro.list', 'msg=Không đủ thông tin để show sản phẩm!');
        }
        $categories = Category::all();
        $model = Category::find($request); 
        $related = Product::where( 'cate_id', '=', $model->id)->get(); 
        if(!$model){
            return redirect()->route('pro.list','msg=id Không Tồn tại !');
        }   
        return view('frontend.shop-grid',[
            'categories' => $categories,
            'cates' => $model,
            'list' => $related
        ]);
    }
    public function blogdetails(){
        return view('frontend.blog-details');
    }
    public function blog(){
        return view('frontend.blog');
    }
    public function checkout(){
        return view('frontend.checkout');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function shopdetails(){
        return view('frontend.shop-details');
    }
    public function wishlist(){
    $items  = json_decode(Cookie::get('cartList'), true);

    return view('frontend.wishlist', compact('items'));
    }
    public function shopingcart(){
        return view('frontend.shoping-cart');
    }
    public function search(Request $request)
{
if($request->ajax())
{
if (isset($request->search)) {
$output="";
$products=DB::table('products')->where('name','LIKE','%'.$request->search."%")->get();
if($products)
{
foreach ($products as $key => $product) {
$output.='<div>'.
'<br>'.
'<a href="shop-detail?id='.$product->id.'">'.$product->name.'</a>'.
'</div>';
}

return Response($output);
}
}  
$output = null;
} 
}
  public function showCart(){
    $items  = json_decode(Cookie::get('cartId'), true);
    $total_quantity = 0;
      return view('frontend.shoping-cart', compact('items'));
  }
  public function addToCart($id)
    {
        $products = Product::find($id);
        //set cookie
        $cookie = Cookie::get('cartId');
        //chuyển dạng  
        $cart = json_decode($cookie,true);
        if (isset($cart[$id])){
            $cart[$id]['quantity'] =   $cart[$id]['quantity'] + 1;
         } else {
          $cart[$id] = [
             'id' => $products->id,
             'name' => $products->name,
             'price' => $products->price,
             'image' => $products->image,
             'quantity' => 1
          ];
        }   
            $array_json = json_encode($cart);
            Cookie::queue('cartId', $array_json);
           
            return response()->json([
                'code' => 200,
                'message' => 'success'
                ]);
    } 
   public function updateCart(Request $request){
      if ($request->id && $request->quantity) {
        $cookie = Cookie::get('cartId');
        $items = json_decode($cookie,true);
        $cate = Category::all();
        $items[$request->id]['quantity'] = $request->quantity;
        $array_json = json_encode($items);
        Cookie::queue('cartId', $array_json);
        $cartComponent = view ('layouts.components.cart-components',[
          'items' => $items,
          'cates' => $cate
        ])->render();
        return response()->json(['cartComponent' => $cartComponent, 'code' => 200],200);
      }
    }
  public function remove(Request $request)
    {
        if($request->id){
            $items =  json_decode(Cookie::get('cartList'), true);
            unset($items[$request->id]);
            $array_json = json_encode($items);
            Cookie::queue('cartList', $array_json);
            //  echo "<pre>";
            // print_r($items);
            // die;
            $cart_Component = view('layouts.components.wishlist-components', compact('items'))->render();

            // $cart_Component = view('frontend.wishlist', compact('items'))->render();
            // echo '<pre>';
            // print_r($cart_Component);die;
            return response()->json([
                'cart_Component' => $cart_Component,
                'code' => 200,
                'message' => 'success'
            ],200);
        }
    }
    public function delete(Request $request)
    {
        if($request->id){
            $items =  json_decode(Cookie::get('cartId'), true);
            unset($items[$request->id]);
            $array_json = json_encode($items);
            Cookie::queue('cartId', $array_json);
            $cartComponent = view('layouts.components.cart-components', compact('items'))->render();
            return response()->json([
                'cartComponent' => $cartComponent,
                'code' => 200,
                'message' => 'success'
            ],200);
        }
    }
  public function addTocWishlist($id){
    $products = Product::find($id);
        $cookies = Cookie::get('cartList');
        $cartWish = json_decode($cookies,true);
          $cartWish[$id] = [
             'id' => $products->id,
             'name' => $products->name,
             'price' => $products->price,
             'image' => $products->image,
          ];
          $array_json = json_encode($cartWish);
          Cookie::queue('cartList', $array_json);
          return response()->json([
              'code' => 200,
              'message' => 'success'
              ], 200);
  }
  public function showWishlist(){
    $items  = json_decode(Cookie::get('cartList'), true);
    $categories = Category::all();
    return view('frontend.wishlist',[
            'items' => $items,
            'cates' => $categories
        ]);
  }
}

