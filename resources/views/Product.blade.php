<!DOCTYPE html>
<html lang="en">

<head>
    <link type="image/png" sizes="16x16" rel="icon" href="/images/avatar.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Admin Product</title>

    <!-- Custom fonts for this template-->
    <!-- icon -->
    <link href="{{ asset('bootstrap/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- text-font -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- {{ asset('bootstrap/') }} -->
    <!-- Custom styles for this template-->
    <link href="{{ asset('bootstrap/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/Product.css">
</head>

<body id="page-top">

    @include('layouts.Adminlayout')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Products</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            <input type="text" class="form-control" placeholder="Find Product" aria-label="Username"
                aria-describedby="addon-wrapping" id="search">
            <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off" id="Popupadd"
                data-toggle="modal" data-target="#addModalproduct">+
                Add</button>
        </div>

        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Id Product</th>
                            <th>Name Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Review</th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody class="capnhat">
                            @foreach($products as $products)
                            <tr>
                                <td>{{ $products->idproduct }}</td>
                                <td>{{ $products->nameproduct }}</td>
                                <td class="font-weight-bold" style="color:blue">{{ $products->price }}$</td>
                                <td class="font-weight-bold" style="color:red">{{ $products->inventoryquantity }}</td>
                                <td><img src="{{ $products->image }}" class="imgproduct"></td>
                                <td>{{ $products->review }}</td>
                                <td><button class="buttonfix" data-toggle="modal" data-target="#updateModalproduct"
                                        data-product-name="{{ $products->nameproduct }}"
                                        data-product-id="{{ $products->idproduct }}"
                                        data-product-price="{{ $products->price }}"
                                        data-product-quantity="{{ $products->inventoryquantity }}"
                                        data-product-review="{{ $products->review }}"><i
                                            class="bi bi-pencil-square"></i> Change</button>
                                </td>
                                <td><button class="buttonfix" data-toggle="modal" data-target="#deleteModalproduct"
                                        data-product-name="{{ $products->nameproduct }}"
                                        data-product-id="{{ $products->idproduct }}"
                                        data-product-price="{{ $products->price }}"
                                        data-product-quantity="{{ $products->inventoryquantity }}"
                                        data-product-namecategory="{{ $products->category->namecategory }}"
                                        data-product-review="{{ $products->review }}"><i class="bi bi-trash"></i>
                                        Delete</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Technology Store 2023</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    @extends('layouts.Modalpopup')

    @extends('layouts.Linkadmin')
    <script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function() {
            preview.src = reader.result;
        }
        reader.readAsDataURL(file);
    }

    function previewImage2(event) {
        const preview = document.getElementById('preview2');
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function() {
            preview.src = reader.result;
        }
        reader.readAsDataURL(file);
    }

    $(document).ready(function() {
        // Lấy giá trị data-category-id khi modal được hiển thị
        $('#updateModalproduct').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút "Change" được nhấn
            var productName = button.data('product-name'); // Lấy giá trị data-category-id
            var productId = button.data('product-id'); // Lấy giá trị data-category-id
            var productPrice = button.data('product-price'); // Lấy giá trị data-category-id
            var productQuantity = button.data('product-quantity'); // Lấy giá trị data-category-id
            var productReview = button.data('product-review'); // Lấy giá trị data-category-id
            var modal = $(this);
            // Gán giá trị categoryId vào trường ẩn trong form
            modal.find('input[name="nameproduct"]').val(productName);
            modal.find('input[name="idproduct"]').val(productId);
            modal.find('input[name="price"]').val(productPrice);
            modal.find('input[name="quantity"]').val(productQuantity);
            modal.find('textarea[name="review"]').val(productReview);
        });

        $('#deleteModalproduct').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút "Change" được nhấn
            var productName = button.data('product-name'); // Lấy giá trị data-category-id
            var productId = button.data('product-id'); // Lấy giá trị data-category-id
            var productPrice = button.data('product-price'); // Lấy giá trị data-category-id
            var productNamecategory = button.data(
                'product-namecategory'); // Lấy giá trị data-category-id
            var productQuantity = button.data('product-quantity'); // Lấy giá trị data-category-id
            var productReview = button.data('product-review'); // Lấy giá trị data-category-id
            var modal = $(this);
            // modal.find('img[name="imgsp"]').attr('src', productimg); gắn src cho thẻ img
            modal.find('span[name="nameproduct"]').text(productName);
            modal.find('input[name="idproduct"]').val(productId);
            modal.find('span[name="price"]').text(productPrice);
            modal.find('span[name="namecategory"]').text(productNamecategory);
            modal.find('span[name="quantity"]').text(productQuantity);
            modal.find('span[name="review"]').text(productReview);
        });
    });

    $('#search').on('input', function() {
        var search = $(this).val();
        $.ajax({
            type: 'POST',
            url: '{{ route("admin.findproduct") }}',
            data: {
                _token: '{{ csrf_token() }}',
                search: search
            },
            success: function(response) {
                var html = response.html;
                $('.capnhat').html(html);
            },
            error: function(xhr, status, error) {}
        });
    });
    </script>
</body>

</html>