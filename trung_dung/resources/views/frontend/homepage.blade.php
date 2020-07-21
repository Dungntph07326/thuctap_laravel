<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
    <table>
    <thead>
       <th>Mã</th>
       <th>Tên sản phẩm</th>
       <th>Ảnh sản phẩm</th>
       <th>Giá</th>
       <tbody>
       @foreach($products as $cursor)
       <tr>
       <td>{{$cursor->id}}</td>
       <td>{{$cursor->name}}</td>
       <td><img src="{{$cursor->image}}" width="100px"  alt=""></td>
       <td>{{$cursor->price}}</td>
       @endforeach
        </tr>
       </tbody>
    </thead>
    </table>
</body>
</html>