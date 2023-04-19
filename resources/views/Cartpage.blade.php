<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Cartpage.css">
    <title>My Cart</title>
</head>

<body>
    <div class="body">
        <div class="leftbody">
            <a href="{{ route('user.page') }}"><img src="/images/logo.png"></a>
            <p class="content">USER</p>
            <a class="linkus" href="{{ route('profileuser.page') }}">
                <i class="bi bi-person"></i>
                <p class="fixtxt">Profile</p>
            </a>
            <a class="linkus" href="{{ route('changepassword.page') }}">
                <i class="bi bi-lock"></i>
                <p class="fixtxt">Change Password</p>
            </a>
            <a class="linkus active" href="{{ route('cart.page') }}">
                <i class="bi bi-cart"></i>
                <p class="fixtxt">My Cart</p>
            </a>
            <a class="linkus" href="{{ route('order.page') }}">
                <i class="bi bi-list-ul"></i>
                <p class="fixtxt">My Purchase order</p>
            </a>
            <a class="linkus" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-in-left"></i>
                <p class="fixtxt">Logout</p>
            </a>
            <a class="linkus" href="{{ route('user.page') }}">
                <i class="bi bi-arrow-90deg-left"></i>
                <p class="fixtxt">Back to shop</p>
            </a>
        </div>
        <div class="rightbody">
            <div class="headright">
                <div class="sotien">
                    <p class="txtblc">Account balance: <span id="balance" style="font-weight:bold">******</span></p>
                    <i class="bi bi-eye-slash" id="eye1"></i>
                    <i class="bi bi-eye" id="eye2"></i>
                </div>
                <button class="naptien">Recharge</button>
            </div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="myCheckbox"></th>
                        <th scope="col">#</th>
                        <th scope="col">Sample</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="space"></tr>
                    <tr>
                        <td class="fixcenter"><input type="checkbox" class="cbxcon"></td>
                        <th scope="row" class="fixcenter">1</th>
                        <td><img src="/images/logo.png" class="imgsp"></td>
                        <td class="fixcenter">Keyboard Gaming</td>
                        <td class="fixcenter"><input aria-label="quantity" class="input-qty" max="99" min="1"
                                name="quantity" type="number" value="1">
                        </td>
                        <td class="fixcenter">100.00$</td>
                        <td class="fixcenter"><button class="btnsave">Update</button></td>
                    </tr>
                    <tr class="space"></tr>
                    <tr>
                        <td class="fixcenter"><input type="checkbox" class="cbxcon"></td>
                        <th scope="row" class="fixcenter">2</th>
                        <td><img src="/images/logo.png" class="imgsp"></td>
                        <td class="fixcenter">Keyboard Gaming</td>
                        <td class="fixcenter"><input aria-label="quantity" class="input-qty" max="99" min="1"
                                name="quantity" type="number" value="1">
                        </td>
                        <td class="fixcenter">100.00$</td>
                        <td class="fixcenter"><button class="btnsave">Update</button></td>
                    </tr>
                    <tr class="space"></tr>
                    <tr>
                        <td class="fixcenter"><input type="checkbox" class="cbxcon"></td>
                        <th scope="row" class="fixcenter">3</th>
                        <td><img src="/images/logo.png" class="imgsp"></td>
                        <td class="fixcenter">Keyboard Gaming</td>
                        <td class="fixcenter"><input aria-label="quantity" class="input-qty" max="99" min="1"
                                name="quantity" type="number" value="1">
                        </td>
                        <td class="fixcenter">100.00$</td>
                        <td class="fixcenter"><button class="btnsave">Update</button></td>
                    </tr>
                    <tr class="space"></tr>
                    <tr>
                        <td class="fixcenter"><input type="checkbox" class="cbxcon"></td>
                        <th scope="row" class="fixcenter">3</th>
                        <td><img src="/images/logo.png" class="imgsp"></td>
                        <td class="fixcenter">Keyboard Gaming</td>
                        <td class="fixcenter"><input aria-label="quantity" class="input-qty" max="99" min="1"
                                name="quantity" type="number" value="1">
                        </td>
                        <td class="fixcenter">100.00$</td>
                        <td class="fixcenter"><button class="btnsave">Update</button></td>
                    </tr>
                    <tr class="space"></tr>
                    <tr>
                        <td class="fixcenter"><input type="checkbox" class="cbxcon"></td>
                        <th scope="row" class="fixcenter">3</th>
                        <td><img src="/images/logo.png" class="imgsp"></td>
                        <td class="fixcenter">Keyboard Gaming</td>
                        <td class="fixcenter"><input aria-label="quantity" class="input-qty" max="99" min="1"
                                name="quantity" type="number" value="1">
                        </td>
                        <td class="fixcenter">100.00$</td>
                        <td class="fixcenter"><button class="btnsave">Update</button></td>
                    </tr>
                    <tr class="space"></tr>
                    <tr>
                        <td class="fixcenter"><input type="checkbox" class="cbxcon"></td>
                        <th scope="row" class="fixcenter">3</th>
                        <td><img src="/images/logo.png" class="imgsp"></td>
                        <td class="fixcenter">Keyboard Gaming</td>
                        <td class="fixcenter"><input aria-label="quantity" class="input-qty" max="99" min="1"
                                name="quantity" type="number" value="1">
                        </td>
                        <td class="fixcenter">100.00$</td>
                        <td class="fixcenter"><button class="btnsave">Update</button></td>
                    </tr>
                    <tr class="space"></tr>
                </tbody>
            </table>
            <div class="footright">
                <div class="pay">
                    <p class="txtsp" id="cbxsl">Select(0)</p>
                    <button class="btnpay">Deselect</button>
                </div>
                <button class="btnpay">Delete All</button>
                <div class="pay">
                    <p class="txtsp">Product():</p>
                    <p class="txtsp">100$</p>
                    <button class="btnpay">Payment</button>
                </div>

            </div>
        </div>
    </div>
    @extends('layouts.Foot')
    <script>
    $(document).ready(function() {
        var isHidden = true;
        var balance = '10000.00$';

        $('#eye1, #eye2').click(function() {
            if (isHidden) {
                $("#eye2").hide();
                $("#eye1").show();
                $('#balance').text(balance);
                isHidden = false;
            } else {
                $("#eye1").hide();
                $("#eye2").show();
                $('#balance').text('******');
                isHidden = true;
            }
        });
    });

    $(document).ready(function() {
        // Chọn tất cả sản phẩm
        $('#myCheckbox').click(function() {
            $('.cbxcon').prop('checked', $(this).prop('checked'));
            const count = $('.cbxcon:checked').length;
            $('#cbxsl').text("Select(" + count + ")");
        });

        // Đếm số sản phẩm được chọn
        $('.cbxcon').click(function() {
            const count = $('.cbxcon:checked').length;
            $('#cbxsl').text("Select(" + count + ")");
        });
    });
    </script>
</body>

</html>