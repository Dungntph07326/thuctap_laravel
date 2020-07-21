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
        <h3>Tạo mới sản phẩm</h3>
        <form action="{{route('pro.saveadd')}}" method="POST" enctype="multipart/form-data">
         @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục</label>
                        <select name="cate_id" class="form-control">
                        @foreach ($cates as $ca)
                            <option value="{{$ca->id}}">{{$ca->cate_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả ngắn</label>
                        <textarea name="short_desc" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Đánh giá</label>
                        <input type="number" step="0.1" name="star" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Lượt xem</label>
                        <input type="number" name="view" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" class="form-control" rows="6"></textarea>
                    </div>
                </div>
                <div class=" col-12 text-center">
                    <button type="submit" class="btn btn-info">Lưu</button>
                    <a href="#" class="btn btn-danger">Hủy</a>
                </div>
            </div>
        </form>
    </div>
    
    
</body>
@endsection
</html>