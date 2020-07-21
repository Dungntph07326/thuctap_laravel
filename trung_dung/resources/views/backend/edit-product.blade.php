<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    @extends ('layouts.main')
    @section('main-content')
    <div class="container">
        {{-- query string --}}
        {{-- form data --}}
        <h3>Sửa sản phẩm</h3>
        <form action="{{route('pro.edit',['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
         @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="form-control">
                        @foreach ($cates as $ca)
                            <option @if($ca->id == $product->cate_id) selected @endif value="{{$ca->id}}">{{$ca->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="number" name="price"  value="{{$product->price}}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc"   class="form-control" rows="4">{{$product->short_desc}}</textarea>
                    </div>
                </div>
                <div class="col-6">
                <div class="row">
                <div class="col-4 offset-4">
                <img src="{{$product->image}}" alt="">
                </div>
                </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Đánh giá</label>
                        <input type="number" step="0.1" name="star" value="{{$product->star}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Lượt xem</label>
                        <input type="number" name="view" value="{{$product->views}}" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" class="form-control"  rows="6">{{$product->detail}}</textarea>
                    </div>
                </div>
                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                    <a href="#" class="btn btn-danger">Hủy</a>
                </div>
            </div>
        </form>
    </div>
    
    @endsection
</body>
</html>