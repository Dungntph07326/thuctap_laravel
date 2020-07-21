<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request){
        $kwd =$request->has('keyword') ? $request->keyword : null;
        if($kwd === null) {
            $products = Product::paginate(5);
            $categories = Category::all();
        }else{
            $products = Product::where('cate_name','like',"%$kwd%")->paginate(5);
            $products->withPath("?keyword=$kwd");
            $categories = Category::all();
             
        } 
        return view('backend.list-product',['products'=>$products, 'cates'=>$categories, 'keyword' => $kwd]);  
        //truyền dữ liệu ra màn hình
       
    }
    public function delete(Request $request){
        $id = $request->id;
        $detele = Product::find($id)->delete();
        return redirect()->back();

    }
    public function addPro(){
        $products = Product::all();
        $categories = Category::all();
        return view ('backend.add_product',['products'=>$products, 'cates'=>$categories]);
    }
    // hàm thêm sản phẩm
    public function savePro(Request $request){
        $model = new Product();
      $model->fill($request->all());
      if($request->hasFile('image')){
          $extension = $request->image->extension();
          $filename =  uniqid(). "." . $extension;
          $path = $request->image->storeAs(
            'products', $filename, 'public'
          );
          $model->image = "storage/".$path;  
      }
      $model->save();

      return redirect()->route('pro.list');
    }


    public function editPro(Request $request){
        $request = isset($_GET['id']) ? $_GET['id'] : null;

        if(!$request){
            return redirect()->route('pro.list', 'msg=Không đủ thông tin để sửa !');
        }

        $model = Product::find($request);

        if(!$model){
            return redirect()->route('pro.list','msg=id Không Tồn tại !');
        }
            
        $cate = Category::all();
        
        return view('backend.edit-product',[
            'product' =>$model,
            'cates' => $cate
        ]);
   }
        

    public function saveProduct(Request $request){
        $request = isset($_GET['id']) ? $_GET['id'] : null;
        
        if(!$request){
            return redirect()->route('pro.list','msg=Không Đủ Thông Tin Để Update');
            die;
        }

        $model = Product::find($request);
       $msg="";
        if(!$model){
            return redirect()->route('pro.list','msg= ID Không Tồn Tại');
            die;
        }

        $request = $_POST;
        $imgFile = $_FILES['image'];
        $model->fill($request);
        $filename = $model->image;

        if ($imgFile['size'] > 0) {
            $filename = uniqid() . '-' . $imgFile['name'];
            move_uploaded_file($imgFile['tmp_name'], '../public/uploads/' . $filename);
            $filename = '/'. 'uploads/' . $filename;
        }
        $model->image = $filename;
        $model->save();
        return redirect()->route('pro.list','msg= Sửa Sản Phẩm Thành Công');
}

public function showProduct(Request $request){
    $request = isset($_GET['id']) ? $_GET['id'] : null;

        if(!$request){
            return redirect()->route('pro.list', 'msg=Không đủ thông tin để show sản phẩm!');
        }
        $cate = Category::all();
        $model = Product::find($request);
        $related = Product::where( 'cate_id', '=', $model->cate_id)->get(); 
        if(!$model){
            return redirect()->route('pro.list','msg=id Không Tồn tại !');
        }     
        return view('frontend.shop-details',[
            'product' =>$model ,
            'list' =>  $related,
            'cates' => $cate   
        ]);     
}
public function dashboard(){
    return view('backend.dashboard');
}


}
