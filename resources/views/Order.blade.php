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
    <title>Admin Order</title>

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
    <link rel="stylesheet" href="/css/Order.css">
</head>

<body id="page-top">

    @include('layouts.Adminlayout')

    
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off">+ Add</button> -->
        </div>

        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Id Cart</th>
                            <th>Id Product</th>
                            <th>Name Product</th>
                            <th>Id User</th>
                            <th>Unit Price</th>
                            <th>Quatifier</th>
                            <th>Total Price</th>
                            <th>Quantity</th>
                            <th>Time</th>
                            <!-- <th>Status</th> -->
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($cart as $cart)
                            <tr>
                                <td>{{ $cart->idcart }}</td>
                                <td>{{ $cart->idproduct }}</td>
                                <td>{{ $cart->product->nameproduct }}</td>
                                <td>{{ $cart->id }}</td>
                                <td class="fixtd2">{{ number_format($cart->product->price, 2) }} $</td>
                                <td class="fixtd">{{ $cart->quatifier }}</td>
                                <td class="fixtd2">
                                    {{ number_format($cart->quatifier * $cart->product->price, 2) }}
                                    $</td>
                                <td class="fixtd">{{ $cart->product->inventoryquantity }}</td>
                                <td>{{ $cart->updated_at }}</td>
                                <!-- <td class="fixtd">Waiting</td> -->
                                @if($cart->quatifier < $cart->product->inventoryquantity)
                                    <td><button class="buttonfix" data-toggle="modal" data-target="#acceptModal"
                                            data-idcart="{{ $cart->idcart }}"
                                            data-nameproduct="{{ $cart->product->nameproduct }}"
                                            data-idproduct="{{ $cart->idproduct }}"
                                            data-quatifier="{{ $cart->quatifier }}" data-id="{{ $cart->id }}"
                                            data-image="{{ $cart->product->image }}"
                                            data-totalprice="{{ number_format($cart->quatifier * $cart->product->price, 2) }}"
                                            data-quantity="{{ $cart->product->inventoryquantity }}">
                                            <i class="bi bi-check2"></i> Accept</button></td>
                                    @else
                                    <td><button class="buttonfix" data-toggle="modal" data-target="#acceptModal2"
                                            data-idcart="{{ $cart->idcart }}"
                                            data-nameproduct="{{ $cart->product->nameproduct }}"
                                            data-idproduct="{{ $cart->idproduct }}"
                                            data-quatifier="{{ $cart->quatifier }}" data-id="{{ $cart->id }}"
                                            data-image="{{ $cart->product->image }}"
                                            data-totalprice="{{ number_format($cart->quatifier * $cart->product->price, 2) }}"
                                            data-quantity="{{ $cart->product->inventoryquantity }}">
                                            <i class="bi bi-check2"></i> Accept</button></td>
                                    @endif
                                    <td><button class="buttonfix" data-toggle="modal" data-target="#denyModal"
                                            data-idcart="{{ $cart->idcart }}"
                                            data-nameproduct="{{ $cart->product->nameproduct }}"
                                            data-quatifier="{{ $cart->quatifier }}" data-id="{{ $cart->id }}"
                                            data-image="{{ $cart->product->image }}"
                                            data-totalprice="{{ number_format($cart->quatifier * $cart->product->price, 2) }}"><i
                                                class="bi bi-x"></i> Deny</button></td>
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
    $(document).ready(function() {
        // Lấy giá trị data-category-id khi modal được hiển thị
        $('#acceptModal').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút "Change" được nhấn
            var idCart = button.data('idcart'); // Lấy giá trị data-category-id
            var idProduct = button.data('idproduct'); // Lấy giá trị data-category-id
            var nameProduct = button.data('nameproduct'); // Lấy giá trị data-category-id
            var image = button.data('image'); // Lấy giá trị data-category-id
            var id = button.data('id'); // Lấy giá trị data-category-id
            var quatifier = button.data('quatifier'); // Lấy giá trị data-category-id
            var quantity = button.data('quantity'); // Lấy giá trị data-category-id
            var totalPrice = button.data('totalprice'); // Lấy giá trị data-category-id
            var modal = $(this);
            // Gán giá trị categoryId vào trường ẩn trong form
            modal.find('input[name="idcart"]').val(idCart);
            modal.find('input[name="image"]').val(image);
            modal.find('input[name="id"]').val(id);
            modal.find('input[name="totalprice"]').val(totalPrice);
            modal.find('span[name="nameproduct"]').text(nameProduct);
            modal.find('input[name="nameproduct"]').val(nameProduct);
            modal.find('span[name="idproduct"]').text(idProduct);
            modal.find('input[name="idproduct"]').val(idProduct);
            modal.find('input[name="quatifier"]').val(quatifier);
            modal.find('span[name="quatifier"]').text(quatifier);
            modal.find('span[name="quantity"]').text(quantity);
            modal.find('span[name="totalprice"]').text(totalPrice + ' $');
        });

        $('#acceptModal2').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút "Change" được nhấn
            var idCart = button.data('idcart'); // Lấy giá trị data-category-id
            var idProduct = button.data('idproduct'); // Lấy giá trị data-category-id
            var nameProduct = button.data('nameproduct'); // Lấy giá trị data-category-id
            var image = button.data('image'); // Lấy giá trị data-category-id
            var id = button.data('id'); // Lấy giá trị data-category-id
            var quatifier = button.data('quatifier'); // Lấy giá trị data-category-id
            var quantity = button.data('quantity'); // Lấy giá trị data-category-id
            var totalPrice = button.data('totalprice'); // Lấy giá trị data-category-id
            var modal = $(this);
            // Gán giá trị categoryId vào trường ẩn trong form
            modal.find('input[name="idcart"]').val(idCart);
            modal.find('input[name="image"]').val(image);
            modal.find('input[name="id"]').val(id);
            modal.find('input[name="totalprice"]').val(totalPrice);
            modal.find('span[name="nameproduct"]').text(nameProduct);
            modal.find('input[name="nameproduct"]').val(nameProduct);
            modal.find('span[name="idproduct"]').text(idProduct);
            modal.find('input[name="idproduct"]').val(idProduct);
            modal.find('input[name="quatifier"]').val(quatifier);
            modal.find('span[name="quatifier"]').text(quatifier);
            modal.find('span[name="quantity"]').text(quantity);
            modal.find('span[name="totalprice"]').text(totalPrice + ' $');
        });


        $('#denyModal').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút "Change" được nhấn
            var idCart = button.data('idcart'); // Lấy giá trị data-category-id
            var nameProduct = button.data('nameproduct'); // Lấy giá trị data-category-id
            var image = button.data('image'); // Lấy giá trị data-category-id
            var id = button.data('id'); // Lấy giá trị data-category-id
            var quatifier = button.data('quatifier'); // Lấy giá trị data-category-id
            var totalPrice = button.data('totalprice'); // Lấy giá trị data-category-id
            var modal = $(this);
            // Gán giá trị categoryId vào trường ẩn trong form
            modal.find('input[name="idcart"]').val(idCart);
            modal.find('input[name="image"]').val(image);
            modal.find('input[name="id"]').val(id);
            modal.find('span[name="nameproduct"]').text(nameProduct);
            modal.find('input[name="nameproduct"]').val(nameProduct);
            modal.find('input[name="quatifier"]').val(quatifier);
            modal.find('span[name="quatifier"]').text(quatifier);
            modal.find('input[name="totalprice"]').val(totalPrice);
            modal.find('span[name="totalprice"]').text(totalPrice + ' $');
        });


    });
    </script>
</body>

</html>