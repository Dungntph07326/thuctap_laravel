<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Danh mục</title>
</head>

<body>
    @extends ('layouts.main')
    @section('main-content')
    <div class="container">
        <form action="" method="get" class="col-12">
        @csrf
            <div class=" text-center ">
                <button type="submit" class="btn btn-primary btn-sm">Tìm Kiếm</button>

            </div>
            <h1 class="mt-4"> Danh Mục</h1>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Bảng Danh Mục</div>
                <div class="card-body">

                    <table class="table table-stripped">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>total product</th>
                            <th>image</th>
                            <th>Tùy chọn</th>
                            <th>
                                <a href="{{route('cate.addcate')}}" class="btn btn-success">Add new</a>
                            </th>
                        </thead>
                        <tbody>
                            @foreach($cates as $cate)
                            <tr>
                                <td>{{$cate->id}}</td>
                                <td>{{$cate->cate_name}}</td>
                                <td>{{count($cate->products)}}</td>
                                <td>
                                    <img src="{{$cate->image}} " width="100px" alt="">
                                </td>

                                <td>
                                    <a href="{{route('cate.edit',['id'=> $cate->id])}}" class="btn btn-primary">Sửa</a>
                                    <a onclick="openConfirm('{{route('cate.remove',['id' => $cate->id])}}')" href="javascript:;" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                    <div class="row text-center">{{$cates->links()}}</div>
                </div>
            </div>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
            function openConfirm(removeUrl){
                swal({
  title: "Bạn có chắc chắn muốn xóa?",
  text: "Sau khi xóa sẽ không thể phục hồi!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href =removeUrl;
  } else {
    swal("Tập tin vẫn còn :D");
  }
});
            }
            </script>
</body>
@endsection
</html>