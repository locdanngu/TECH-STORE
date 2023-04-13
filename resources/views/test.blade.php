<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Thêm thư viện jQuery từ CDN của Google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Hoặc thêm thư viện jQuery từ CDN của Microsoft -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .my-btn {
        background-color: red;
    }

    .my-btn.active {
        background-color: yellow;
    }
    </style>
</head>

<body>
    <button class="my-btn" id="btn1">Nút 1</button>
    <button class="my-btn" id="btn2">Nút 2</button>
    <button class="my-btn" id="btn3">Nút 3</button>
    <button class="my-btn" id="btn4">Nút 4</button>
    <button class="my-btn" id="btn5">Nút 5</button>


    <script>
    $(document).ready(function() {
        $(".my-btn").on("click", function() {
            // Xóa lớp 'active' từ tất cả các nút
            $(".my-btn").removeClass("active");

            // Thêm lớp 'active' vào nút được bấm
            $(this).addClass("active");
        });
    });
    </script>
</body>

</html>