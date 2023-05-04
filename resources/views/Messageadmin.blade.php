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

    <title>Admin Message</title>

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
    <style>
        .nav-item.active{
            background-color: cornflowerblue;
        }
    </style>
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
            @foreach($latest_messages as $message)
            @if($message->sender_id == $user->id)
            <li class="nav-item">
                <div class="nav-link d-flex align-items-center">
                    <img class="rounded-circle mr-2" src="{{ $message->receiver->avatar }}" alt="..." height="50"
                        width="50">
                    <div class="d-flex flex-column">
                        <span style="color: black;font-weight:800">{{ $message->receiver->name }}</span>
                        <span>{{ $message->message }}</span>
                        <span>Your - {{ \Carbon\Carbon::now()->diffForHumans($message->created_at, true) }}</span>
                    </div>
                </div>
            </li>
            @else
            <li class="nav-item">
                <div class="nav-link d-flex align-items-center">
                    <img class="rounded-circle mr-2" src="{{ $message->sender->avatar }}" alt="..." height="50"
                        width="50">
                    <div class="d-flex flex-column">
                        <span style="color: black;font-weight:800">{{ $message->sender->name }}</span>
                        <span>{{ $message->message }}</span>
                        <span>{{ substr($message->sender->name, strrpos($message->sender->name, ' ') + 1) }}
                            - {{ \Carbon\Carbon::now()->diffForHumans($message->created_at, true) }}</span>
                    </div>
                </div>
            </li>
            @endif
            @endforeach




            <!-- Divider -->




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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

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

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive" style="height:590px">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $usersendmessage->avatar }}" width="50" height="50"
                                        style="border-radius:50%" class="mr-2">
                                    <span class="font-weight-bold">{{ $usersendmessage->name }}</span>
                                </div>
                                <hr>
                                <div id="message-container" class="capnhat"
                                    style="max-height:450px;height: 450px; overflow-x: scroll;padding:0 2em">
                                    @foreach ($messages as $message)
                                    @if($message->sender_id == $user->id)
                                    <div class="d-flex flex-column align-items-end">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex flex-column align-items-end">
                                                <span
                                                    style="background-color: #3A3B3CD1; color: #FFFFFF;padding: .25em .75em; border-radius: 1em;max-width: 500px;display: inline-block; word-wrap: break-word;width: fit-content">
                                                    {{$message->message}}</span>
                                                <span style="font-size:0.75em; margin-top:.5em"> (Send at:
                                                    {{$message->created_at}})</span>
                                            </div>
                                            <img src="{{ $user->avatar }}" width="50" height="50"
                                                style="border-radius:50%" class="ml-2">
                                        </div>
                                    </div>
                                    <br>
                                    @else
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <input type="hidden" value="{{ $message->sender->id }}" name="sender_id"
                                                class="sender_id"></input>
                                            <img src="{{ $message->sender->avatar }}" width="50" height="50"
                                                style="border-radius:50%" class="mr-2">
                                            <div class="d-flex flex-column">
                                                <span
                                                    style="background-color: #3A3B3CD1; color: #FFFFFF;padding: .25em .75em; border-radius: 1em;max-width: 500px;display: inline-block; word-wrap: break-word;width: fit-content">
                                                    {{$message->message}}</span>
                                                <span style="font-size:0.75em; margin-top:.5em"> (Send at:
                                                    {{$message->created_at}})</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    @endif
                                    @endforeach
                                </div>
                                <div class="d-flex align-items-center justify-content-between"
                                    style="padding:0 2em;   ">
                                    <textarea name="messagecontent"
                                        style="width:93%;padding:0 0.5em;border-radius:5px;border:1px solid black;resize: none;height:3em !important;"
                                        oninput="autoGrow(this)"></textarea>
                                    <button type="button" class="btn btn-primary" id="buttonsend"
                                        style="height:3em !important">Send</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->

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
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="{{ route('logout.admin') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @extends('layouts.Linkadmin')

    <script>
    $(document).ready(function() {
        // Đăng ký sự kiện click cho nút
        $(".nav-item").eq(0).addClass("active");

        $('#buttonsend').click(function() {
            // Thực hiện ajax request để gửi tin nhắn
            $.ajax({
                type: 'POST',
                url: '{{ route("admin.addmessage") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    messagecontent: $('textarea[name="messagecontent"]').val(),
                    sender_id: $('.sender_id').val(),
                },
                success: function(response) {
                    // Nếu thành công, tải lại nội dung của phần tử message-container
                    $('#message-container').load(window.location.href +
                        ' #message-container');
                    $('textarea[name="messagecontent"]').val('');
                    $('textarea[name="messagecontent"]').css('height', '3em');
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi nếu cần
                }
            });
        });

        $('.nav-item').on("click", function() {
            $(".nav-item").removeClass("active");
            $(this).addClass("active");
        });

    });

    $('textarea[name="messagecontent"]').keypress(function(event) {
        if (event.which == 13) { // 13 là mã ASCII của phím Enter
            event.preventDefault();
            var content = $(this).val();
            $.ajax({
                type: 'POST',
                url: '{{ route("admin.addmessage") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    messagecontent: $('textarea[name="messagecontent"]').val(),
                    sender_id: $('.sender_id').val(),
                },
                success: function(response) {
                    // Nếu thành công, tải lại nội dung của phần tử message-container
                    $('#message-container').load(window.location.href + ' #message-container');
                    $('textarea[name="messagecontent"]').val('');
                    $('textarea[name="messagecontent"]').css('height', '3em');
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi nếu cần
                }
            });
        }
    });

    var messageContainer = $("#message-container");
    messageContainer.scrollTop(messageContainer[0].scrollHeight);


    function autoGrow(element) {
        element.style.height = "3em";
        element.style.height = (element.scrollHeight) + "px";
    }
    </script>
</body>

</html>