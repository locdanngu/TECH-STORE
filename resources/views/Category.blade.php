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

    @include('layouts.Adminlayout')
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
            <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off" id="Popupadd"
                data-toggle="modal" data-target="#addModalcategory">+
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
                                <td><button class="buttonfix" data-toggle="modal" data-target="#updateModalcategory"
                                        data-category-name="{{ $category->namecategory }}"
                                        data-category-id="{{ $category->idcategory }}"><i
                                            class="bi bi-pencil-square"></i> Change</button>
                                </td>
                                @if($category->products_count==0)
                                <td><button class="buttonfix" data-toggle="modal" data-target="#deleteModalcategory"
                                        data-category-name="{{ $category->namecategory }}"
                                        data-category-id="{{ $category->idcategory }}"
                                        data-numberproduct="{{ $category->products_count }}"><i class="bi bi-trash"></i>
                                        Delete</button></td>
                                @else
                                <td><button class="buttonfix" data-toggle="modal" data-target="#deleteModalcategory2"
                                        data-category-name="{{ $category->namecategory }}"
                                        data-category-id="{{ $category->idcategory }}"
                                        data-numberproduct="{{ $category->products_count }}"><i class="bi bi-trash"></i>
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