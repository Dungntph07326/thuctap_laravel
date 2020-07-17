<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

  
    public function index(Request $request){
        $kwd =$request->has('keyword') ? $request->keyword : null;
        if($kwd === null) {
            $categories = Category::paginate(5);
        }else{
            $categories= Category::where('cate_name','like',"%$kwd%")->paginate(3);
            $categories->withPath("?keyword=$kwd");
             
        } 
        return view('cate.list',['cates'=>$categories, 'keyword' => $kwd]);  
        //truyền dữ liệu ra màn hình
       
    }
    public function delete($removeId) {
        Category::destroy($removeId);
        return redirect()->back();
    }
   public function addcate(){
       return view('cate.add-cate');
   }
   public function saveAdd(Request $request){
       $request->validate([
       'cate_name' => 'required|unique:categories|min:4'
       ],
        [
            'cate_name.required' => " hãy nhập tên danh mục",
            'cate_name.unique' => 'tên danh mục đã tồn tại',
            'cate_name.min' => 'Tên danh mục phải lớn hơn 3 kí tự',
        ]
    );
       $model = new Category();
       $model->fill($request->all());
       if($request->hasFile('image')){
           $extension = $request->image->extension();
           $filename = uniqid(). "." .$extension;
           $path = $request->image->storeAs('categories',$filename,'public');
           $model->image = 'storage/'.$path;
       }
    //    $model->cate_name = $request->cate_name;
    //    $model->show_menu = $request->has('show_menu') ? $request->show_menu : null;
       $model->save();
       return redirect()->route('cate.list');
   }
   public function edit($id){
      $model = Category::find($id);
      if(empty($model)){
        return redirect()->route('cate.list');
      }
      return view('cate.edit-cate', [
      'model' => $model
      ]);
   }
   public function saveCate($id, Request $request){
    $model = Category::find($id);
    $model->fill($request->all());

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
    return redirect()->route('cate.list');
}
}
