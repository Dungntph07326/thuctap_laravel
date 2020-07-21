<div class="container shopping_cart_render">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table class="shopping-cart-wrapper" data-url="{{route('cart.delete')}}">
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_array($items) || is_object($items))
                                @foreach ($items as $id => $item)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{$item['image']}}" alt="">
                                        <h5>{{$item['name']}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                      {{number_format($item['price'])}} VNĐ
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a onclick="return confirm('xóa nhé');" data-id="{{$id}}" class="cart_delete"><span class="icon_close"></a></span>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    </div>
                </div>
            </div>
        </div>