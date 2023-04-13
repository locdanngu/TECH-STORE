<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Userpage.css">
    <title>User Page</title>

</head>

<body>
    <div class="body">
        <div class="leftbody">
            <a href="{{ route('user.page') }}"><img src="/images/logo.png"></a>
            <!-- <p class="content">USER</p> -->
            <a class="linkus" href="{{ route('profileuser.page') }}">
                <i class="bi bi-person"></i>
                <p class="fixtxt">Profile</p>
            </a>
            <a class="linkus">
                <i class="bi bi-box-arrow-in-left"></i>
                <p class="fixtxt">Logout</p>
            </a>
            <p class="content">CATEGORY</p>
            <!-- Kiểm tra xem đã chọn category chưa , chưa thì active để đổi background color -->
            <div class="linkus active" data-url="0">
                <i class="bi bi-list-ul"></i>
                <p class="fixtxt">All product</p>
            </div>
            @foreach($category as $category)
            <!--Kiểm tra xem category có tồn tại không, nếu chưa chọn thì ko thêm active, Nếu đã chọn category thì thêm active vào -->
            <div class="linkus" data-url="{{ $category->idcategory }}">
                <i class="{{ $category->iconcategory }}"></i>
                <p class="fixtxt">{{ $category->namecategory }}</p>
            </div>
            @endforeach
        </div>
        <div class="rightbody">
            <div class="headright">
                <div class="lefthead">
                    <input class="search" type="text" placeholder="Search">
                </div>
                <div class="righthead">
                    <div class="dropdown">
                        <button class="btn" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item dropdown-item-ignore-close">Dropdown item</li>
                            <li class="dropdown-item dropdown-item-ignore-close">Dropdown item</li>
                            <li class="dropdown-item dropdown-item-ignore-close">Dropdown item</li>
                        </ul>
                    </div>
                    <!-- <a href="" class="btnlink"><i class="bi bi-bell"></i></a> -->
                    <a href="" class="btnlink"><i class="bi bi-cart"></i></a>
                    <img src="/images/sample2.png" class="avataruser">
                </div>

            </div>
            <div class="bodyright">
                <!-- <a href="" class="loc active">All</a> -->
                <div href="" class="loc active" data-url="0">Price <i class="bi bi-arrow-up"></i></div>
                <div href="" class="loc" data-url="1">Price <i class="bi bi-arrow-down"></i></div>
            </div>
            <div class="allmonhang">
                @foreach($products as $product)
                <div class="monhang">
                    <a href=""><img src="{{ $product->image }}" class="imgsp"></a>
                    <p class="namesp">{{ $product->nameproduct }}</p>
                    <p class="namehangsp">{{ $product->category->namecategory }}</p>
                    <p class="price">${{ $product->price }}</p>
                    <!-- <p class="price">${{ $product->idcategory }}</p> -->
                    <a href="" class="addtocart"><i class="bi bi-plus-circle"></i> Add to cart</a>
                </div>
                @endforeach
            </div>
            <div class="phantrang">
                <a class="numpt" href="">1</a>
                <a class="numpt" href="">2</a>
                <a class="numpt" href="">3</a>
                <a class="numpt" href="">4</a>
            </div>
        </div>
    </div>
    @extends('layouts.Foot')
    <script>
    //ngăn chặn việc đóng dropdown khi chỉ bấm vào phần tử bên trong
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownItemsIgnoreClose = document.querySelectorAll('.dropdown-item-ignore-close');
        dropdownItemsIgnoreClose.forEach(function(item) {
            item.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
    });

    $(document).ready(function() {
        // Lắng nghe sự kiện click trên các div có class "linkus" để lọc sản phẩm theo category
        $(".linkus").on("click", function() {
            // Lấy giá trị từ thuộc tính "data-value" của div đang được click
            var idcategory = $(this).data('url'); // Lấy giá trị của thuộc tính data-url của thẻ div
            var idprice = $('.loc.active').data('url');
            // Xóa class "active" trên tất cả các div có class "btn"
            $(".linkus").removeClass("active");
            // Thêm class "active" vào div được click
            $(this).addClass("active");
            updateProductList(idcategory, idprice);
        });

        $(".loc").on("click", function() {
            var idprice = $(this).data('url');
            var idcategory = $('.linkus.active').data('url');
            $(".loc").removeClass("active");
            $(this).addClass("active");
            updateProductList(idcategory, idprice);
        });

        function updateProductList(idcategory, idprice) {
            $.ajax({
                type: 'POST',
                url: '/Userpage/' + idcategory + '/' + idprice,
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    var html = response.html;
                    $('.allmonhang').html(html);
                },
                error: function(xhr, status, error) {}
            });
        }
    });

    $(".linkus, .loc").on("click", function() {
        $(".search").val("");      //khi bấm 1 trong 2 nút thì giá trong ô input đc reset
    });

    //Lắng nghe sự kiện nhập vào ô tìm kiếm
    $('.search').on('input', function() {
        var search = $(this).val();
        var idcategory = $('.linkus.active').data('url');
        var idprice = $('.loc.active').data('url');
        // if (!search) {
        //     search = '';
        // } 

        $.ajax({
            type: 'POST',
            url: '/Userpage/' + idcategory + '/' + idprice + '/' + search,
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                var html = response.html;
                $('.allmonhang').html(html);
            },
            error: function(xhr, status, error) {}
        });
    });
    </script>
</body>

</html>