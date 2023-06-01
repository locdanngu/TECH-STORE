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
    <title>Admin Categories</title>

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
    <link rel="stylesheet" href="/css/Category.css">
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
                        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                        <input type="text" class="form-control" placeholder="Find Category" aria-label="Username"
                            aria-describedby="addon-wrapping" id="search">
                        <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off"
                            id="Popupadd" data-toggle="modal" data-target="#addModalcategory">+
                            Add</button>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <th>Id Category</th>
                                        <th>Name Category</th>
                                        <th>Icon</th>
                                        <th>Number Product</th>
                                        <th></th>
                                        <th></th>
                                    </thead>
                                    <tbody class="capnhat">
                                        @foreach($category as $category)
                                        <tr>
                                            <td>{{ $category->idcategory }}</td>
                                            <td>{{ $category->namecategory }}</td>
                                            <td><i class="{{ $category->iconcategory }}"></i></td>
                                            <td class="font-weight-bold" style="color:red">
                                                {{ $category->products_count }}</td>
                                            <td><button class="buttonfix" data-toggle="modal"
                                                    data-target="#updateModalcategory"
                                                    data-category-name="{{ $category->namecategory }}"
                                                    data-category-id="{{ $category->idcategory }}"><i
                                                        class="bi bi-pencil-square"></i> Change</button>
                                            </td>
                                            @if($category->products_count==0)
                                            <td><button class="buttonfix" data-toggle="modal"
                                                    data-target="#deleteModalcategory"
                                                    data-category-name="{{ $category->namecategory }}"
                                                    data-category-id="{{ $category->idcategory }}"
                                                    data-numberproduct="{{ $category->products_count }}"><i
                                                        class="bi bi-trash"></i>
                                                    Delete</button></td>
                                            @else
                                            <td><button class="buttonfix" data-toggle="modal"
                                                    data-target="#deleteModalcategory2"
                                                    data-category-name="{{ $category->namecategory }}"
                                                    data-category-id="{{ $category->idcategory }}"
                                                    data-numberproduct="{{ $category->products_count }}"><i
                                                        class="bi bi-trash"></i>
                                                    Delete</button></td>
                                            @endif
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
        $('#updateModalcategory').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút "Change" được nhấn
            var categoryName = button.data('category-name'); // Lấy giá trị data-category-id
            var categoryId = button.data('category-id'); // Lấy giá trị data-category-id
            var modal = $(this);
            // Gán giá trị categoryId vào trường ẩn trong form
            modal.find('input[name="namecategory"]').val(categoryName);
            modal.find('input[name="idcategory"]').val(categoryId);
        });

        $('#deleteModalcategory').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút "Change" được nhấn
            var categoryName = button.data('category-name'); // Lấy giá trị data-category-id
            var categoryId = button.data('category-id'); // Lấy giá trị data-category-id
            var numberproduct = button.data('numberproduct'); // Lấy giá trị data-category-id
            var modal = $(this);
            modal.find('input[name="idcategory"]').val(categoryId);
            modal.find('span[name="namecategory"]').text(categoryName);
            modal.find('span[name="idcategory"]').text(categoryId);
            modal.find('span[name="numberproduct"]').text(numberproduct);
        });

        $('#deleteModalcategory2').on('shown.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Nút "Change" được nhấn
            var categoryName = button.data('category-name'); // Lấy giá trị data-category-id
            var categoryId = button.data('category-id'); // Lấy giá trị data-category-id
            var numberproduct = button.data('numberproduct'); // Lấy giá trị data-category-id
            var modal = $(this);
            modal.find('input[name="idcategory"]').val(categoryId);
            modal.find('span[name="namecategory"]').text(categoryName);
            modal.find('span[name="idcategory"]').text(categoryId);
            modal.find('span[name="numberproduct"]').text(numberproduct);
        });
    });


    $('#search').on('input', function() {
        var search = $(this).val();
        $.ajax({
            type: 'POST',
            url: '{{ route("admin.findcategory") }}',
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