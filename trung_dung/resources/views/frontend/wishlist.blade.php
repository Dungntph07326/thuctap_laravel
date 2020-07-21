
@extends ('layouts.mainindex')
    @section('mainindex-content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{!! asset('img/breadcrumb.jpg')!!}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Wish list</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('index')}}">Home</a>
                            <span>Wish list</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad" id="cart-wrapper">
        @include('layouts.components.wishlist-components')
    </section>
    <!-- Shoping Cart Section End -->
    <!-- Js Plugins -->
    <script src="{!! asset('js/jquery-3.3.1.min.js')!!}"></script>
    <script src="{!! asset('js/bootstrap.min.js')!!}"></script>
    <script src="{!! asset('js/jquery.nice-select.min.js')!!}"></script>
    <script src="{!! asset('js/jquery-ui.min.js')!!}"></script>
    <script src="{!! asset('js/jquery.slicknav.js')!!}"></script>
    <script src="{!! asset('js/mixitup.min.js')!!}"></script>
    <script src="{!! asset('js/owl.carousel.min.js')!!}"></script>
    <script src="{!! asset('js/main.js')!!}"></script>
    <script>
       function cartDelete(event) {
        event.preventDefault();
        let urlDeleteCart = $('.shopping-cart-wrapper').data('url');
        let id = $(this).data('id');
        $.ajax({
        type:"GET",
        url: urlDeleteCart,
        data: {id : id},
        success: function (data) {
           
         if(data.code === 200) {

             $('.shopping_cart_render').html(data.cart_Component);
             alert('Xóa sản phẩm thành công');
         }
        },
        });
    }
       $(function (){
        $(document).on('click','.cart_delete' , cartDelete);
       });
    </script>
</body>
</html>
@endsection