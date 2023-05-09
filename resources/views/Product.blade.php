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

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.page') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TECH Admin <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.page') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                About Store
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i>
                    <span>Products</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Products:</h6>
                        <a class="collapse-item" href="{{ route('admin.product') }}">List Product</a>
                        <!-- <a class="collapse-item" href="cards.html">Cards</a> -->
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Categories</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Categories:</h6>
                        <a class="collapse-item" href="{{ route('admin.category') }}">List Categories</a>

                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                About User
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Order</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Order User:</h6>
                        <a class="collapse-item" href="{{ route('admin.order') }}">Order List</a>
                        <a class="collapse-item" href="{{ route('admin.history') }}">Shipping history</a>
                        <a class="collapse-item" href="{{ route('admin.denyhistory') }}">Deny history</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @include('layouts.Message')

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $user->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ $user->avatar }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.setting') }}">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.activity') }}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off"
                            id="Popupadd" data-toggle="modal" data-target="#addModalproduct">+
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
                                            <td>{{ $products->price }}</td>
                                            <td>{{ $products->inventoryquantity }}</td>
                                            <td><img src="{{ $products->image }}" class="imgproduct"></td>
                                            <td>{{ $products->review }}</td>
                                            <td><button class="buttonfix" data-toggle="modal"
                                                    data-target="#updateModalproduct"
                                                    data-product-name="{{ $products->nameproduct }}"
                                                    data-product-id="{{ $products->idproduct }}"
                                                    data-product-price="{{ $products->price }}"
                                                    data-product-quantity="{{ $products->inventoryquantity }}"
                                                    data-product-review="{{ $products->review }}"><i
                                                        class="bi bi-pencil-square"></i> Change</button>
                                            </td>
                                            <td><button class="buttonfix" data-toggle="modal"
                                                    data-target="#deleteModalproduct"
                                                    data-product-name="{{ $products->nameproduct }}"
                                                    data-product-id="{{ $products->idproduct }}"
                                                    data-product-price="{{ $products->price }}"
                                                    data-product-quantity="{{ $products->inventoryquantity }}"
                                                    data-product-namecategory="{{ $products->category->namecategory }}"
                                                    data-product-review="{{ $products->review }}"><i
                                                        class="bi bi-trash"></i>
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
                        <span>Copyright &copy; Technology Store 2021</span>
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