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
    <form action="" method="get" class="col-12">
    @csrf
        <p class="text-danger"></p>
        <table class="table table-stripped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                
                <th>Image</th>
                <th>Price</th>
                <th>
                    <a href="{{route('pro.addpro')}}" class="btn btn-success">Add new</a>
                </th>
            </thead>
            <tbody>
                @foreach($products as $pro)
                    <tr>
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->name}}</td>
                        
                        
                        <td>
                            <img src="{{$pro->image}}" class="img-avatar" width="100">
                        </td>
                        <td>{{$pro->price}}</td>
                        <td>
                            <a href="{{route('pro.edit',['id'=> $pro->id])}}" class="btn btn-primary">Sửa</a>
                            <a onclick="openConfirm('{{route('pro.remove',['id' => $pro->id])}}')" href="javascript:;" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row text-center">{{$products->links()}}</div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
            function openConfirm(removeUrl){
                swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this imaginary file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href =removeUrl;
  } else {
    swal("Your imaginary file is safe!");
  }
});
            }
            </script>
    
    @endsection
</body>
</html>