<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Sửa danh mục</title>
</head>

<body>
    @extends ('layouts.main')
    @section('main-content')
    <div class="container">
    <h1 class="mt-4">Sửa Danh Mục</h1>
    <form action="{{route('cate.edit',['id' => $model->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-6">

                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input type="text" name="cate_name" class="form-control" value="{{$model->cate_name}}">
                </div>
               
                <div class="form-group">
                    <label for="">ShowMenu</label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-danger active">
                            <input type="checkbox"
                            @if($model->show_menu)
                            checked
                            @endif
                             name="show_menu" value="1" checked autocomplete="off">
                        </label>
                </div>
                <div class="form-group">
                        <label for="">Ảnh sản phẩm</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                
            </div>

            <div class=" col-12 ">
                <button type="submit" class="btn btn-info">Lưu</button>
                <a href="" class="btn btn-danger">Hủy</a>
            </div>
        </div>
    </div>
</body>
@endsection
</html>