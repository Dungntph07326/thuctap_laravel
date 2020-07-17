<div class="container shopping_cart_render" >
    <div class="row">
        <div class="col-lg-12">
            <div class="shoping__cart__table update_cart_url" data-url="{{route('cart.update')}}" >
                <table  class="shopping-cart-wrapper" data-url="{{route('cart.remove')}}">
                    <thead>
                        <tr>
                            <th class="shoping__product">Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $total = 0;
                    $total_quantity = 0;
                    @endphp
                    @if (is_array($items) || is_object($items))
                    @foreach($items as $id => $item)
                    @php 
                    $total += $item['price'] * $item['quantity'];
                    $total_quantity += $item['quantity'];
                    @endphp
                        <tr>
                            <td class="shoping__cart__item">
                                <img src="{{$item['image']}}" style="width:200px;" alt="">
                                <h5 class="pro-id">{{$item['name']}}</h5>
                            </td>
                            <td class="shoping__cart__price">
                            {{number_format($item['price'])}} VNĐ
                            </td>
                            <td class="shoping__cart__quantity" data-id = "{{$id}}">
                                <div>
                                    {{-- <div class="cart_update" data-id = "{{$id}}">
                                        <span class="dec qtybtn">-</span>
                                        <input class="cart-input-box" type="number" min="1" value="{{$item['quantity']}}" style="width: 50px;">
                                        <span class="inc qtybtn">+</span>
                                    </div> --}}
                                           <div class="number-input">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                            <input class="quantity" min="1" name="quantity" value="{{$item['quantity']}}" type="number">
                            <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                           </div>
                                </div>
                            </td>
                            <td class="shoping__cart__total">
                            {{number_format($item['price'] * $item['quantity']) }} VNĐ
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
                <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                    Upadate Cart</a> -->
            </div>
        </div>
        <div class="col-lg-6">
            <div class="shoping__continue">
                <div class="shoping__discount">
                    <h5>Discount Codes</h5>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">APPLY COUPON</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="shoping__checkout">
                <h5>Cart Total</h5>
                <ul>
                    <li>Subtotal <span>{{$total_quantity}}</span></li>
                    <li>Total <span>{{number_format($total)}} VNĐ</span></li>
                </ul>
                <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
            </div>
    </div>
</div>