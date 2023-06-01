<!DOCTYPE html>
<html lang="en">

<head>
    <link type="image/png" sizes="16x16" rel="icon" href="/images/avatar.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Admin History</title>

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

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">History Accept</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->

            <a href="{{ route('admin.denyhistory') }}" class="btn btn-primary" data-bs-toggle="button">Deny
                History</a>
        </div>

        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Id Product</th>
                            <th>Name Product</th>
                            <th>Id User</th>
                            <th>Unit Price</th>
                            <th>Quatifier</th>
                            <th>Total Price</th>
                            <th>Quantity</th>
                            <th>Time</th>
                            <th>Status</th>
                            <!-- <th></th>
                                <th></th> -->
                        </thead>
                        <tbody>
                            @foreach($cart as $cart)
                            <tr>
                                <td>{{ $cart->idproduct }}</td>
                                <td>{{ $cart->product->nameproduct }}</td>
                                <td>{{ $cart->id }}</td>
                                <td class="fixtd2">{{ number_format($cart->product->price, 2) }} $</td>
                                <td class="fixtd">{{ $cart->quatifier }}</td>
                                <td class="fixtd2">
                                    {{ number_format($cart->quatifier * $cart->product->price, 2) }} $</td>
                                <td class="fixtd">{{ $cart->product->inventoryquantity }}</td>
                                <td>{{ $cart->updated_at }}</td>
                                <td class="fixtd">Done</td>
                                <!-- <td><button class="buttonfix"><i class="bi bi-check2"></i> Accept</button></td>
                                    <td><button class="buttonfix"><i class="bi bi-trash"></i> Deny</button></td> -->
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
</body>

</html>