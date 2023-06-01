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
    <title>Admin Setting Password</title>

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
    <style>
    .file-input-container {
        margin-top: 2em;
        width: 10em;
        position: relative;
        overflow: hidden;
        /* Độ rộng của nút input file */
        border-radius: .5em;
    }

    .file-input {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .file-input-label {
        display: block;
        width: 100%;
        border-radius: .5em;
        padding: 10px;
        background-color: #8A8A8A;
        /* Màu nền của nút */
        color: #fff;
        /* Màu chữ của nút */
        text-align: center;
        cursor: pointer;
    }

    @media only screen and (max-width: 480px) {
        .card-body {
            width: 100% !important;
        }

    }

    @media only screen and (min-width: 481px) and (max-width: 1024px) {
        .card-body {
            width: 90% !important;
        }

    }
    </style>
</head>

<body id="page-top">

    @include('layouts.Adminlayout')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Setting Password</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
            <input type="hidden" class="form-control" placeholder="Find with name" aria-label="Username"
                aria-describedby="addon-wrapping">
            <button type="button" class="btn btn-primary" data-bs-toggle="button" autocomplete="off"
                style="visibility: hidden">+
                Add</button>
        </div>

        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-body">
                @if($user->verifyemail == false)
                <form style="display: flex; justify-content: center; padding-top:1em" method="POST"
                    action="{{ route('verifyemail.admin') }}">
                    @csrf
                    <div class="d-flex flex-column">
                        <span class="mb-3">Your email has not been confirmed yet.</span>
                        <input type="hidden" value="{{ $user->email }}" name="email">
                        <button class="btn btn-warning btn-icon-split">
                            <span class="text">Verify Your Email</span>
                        </button>
                    </div>
                </form>
                @else
                <div class="d-flex justify-content-center">
                    <span class="mb-3">Your email has been confirmed.</span>
                </div>
                @endif
                <form method="POST" action="{{ route('changepassword.admin') }}" class="table-responsive flex-column"
                    style="align-items: center;display: flex;">
                    @csrf
                    <div class="card-body justify-content-between d-flex" style="width:50%">
                        <span>Email:</span>
                        <span>{{ $user->email }}</span>
                    </div>
                    <div class="card-body justify-content-between d-flex align-items-center" style="width:50%">
                        <span>Old Password:</span>
                        <input type="password" value="" class="form-control"
                            style="text-align: right;width:50%;max-width:80%" name="oldpassword">
                    </div>
                    <div class="card-body justify-content-between d-flex align-items-center" style="width:50%">
                        <span>New Password:</span>
                        <input type="password" value="" class="form-control"
                            style="text-align: right;width:50%;max-width:80%" name="newpassword">
                    </div>
                    <div class="card-body justify-content-between d-flex align-items-center" style="width:50%">
                        <span>Re-enter password:</span>
                        <input type="password" value="" class="form-control"
                            style="text-align: right;width:50%;max-width:80%" name="newpassword2">
                    </div>
                    @error('oldpassword')
                    <div class="card-body d-flex justify-content-end" style="width:50%">
                        <span class=" align-self-end" style="color:red">{{ $message }}</span>
                    </div>
                    @enderror
                    @error('oldnewpassword')
                    <div class="card-body d-flex justify-content-end" style="width:50%">
                        <span class=" align-self-end" style="color:red">{{ $message }}</span>
                    </div>
                    @enderror
                    @error('newpassword')
                    <div class="card-body d-flex justify-content-end" style="width:50%">
                        <span class=" align-self-end" style="color:red">{{ $message }}</span>
                    </div>
                    @enderror
                    @error('success')
                    <div class="card-body d-flex justify-content-end" style="width:50%">
                        <span class=" align-self-end" style="color:red">{{ $message }}</span>
                    </div>
                    @enderror
                    <div class="card-body d-flex justify-content-end" style="width:50%">
                        <button class="btn btn-success btn-icon-split align-self-end">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Save</span>
                        </button>
                    </div>
                </form>
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

    </script>
</body>

</html>