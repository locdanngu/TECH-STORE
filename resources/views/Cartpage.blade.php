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
            <img src=" {{ $user->avatar }}" class="smallavatar">
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
            <a class="linkus" href="{{ route('user.page') }}">
                <i class="bi bi-arrow-90deg-left"></i>
                <p class="fixtxt">Back to shop</p>
            </a>
            <a class="linkus" href="{{ route('logout') }}">
                <i class="bi bi-box-arrow-in-left"></i>
                <p class="fixtxt">Logout</p>
            </a>
        </div>
        <div class="rightbody">
            <div class="headright">
                <div class="sotien">
                    <p class="txtblc">Account balance: <span id="balance" style="font-weight:bold">******</span></p>
                    <i class="bi bi-eye-slash" id="eye1"></i>
                    <i class="bi bi-eye" id="eye2"></i>
                </div>
                <a href="{{ route('user.page') }}" class="naptien2">More Product</a>
                <button class="naptien">Recharge</button>
            </div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <!-- <th scope="col"><input type="checkbox" id="myCheckbox"></th> -->
                        <th scope="col">#</th>
                        <th scope="col">Sample</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">total price</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total_price = 0;
                    $total_product = 0;
                    @endphp
                    @foreach($cart_items as $cart_item)
                    <tr class="space"></tr>
                    <tr>
                        <!-- <td class="fixcenter">
                            <input type="checkbox" name="cart_item[]" value="{{ $cart_item->idproduct }}"
                                class="cbxcon">
                        </td> -->
                        <form method="POST" action="{{ route('cart.update') }}">
                            @csrf
                            <th scope="row" class="fixcenter">{{ $loop->iteration }}</th>
                            <td><img src="{{ $cart_item->image }}" class="imgsp"></td>
                            <td class="fixcenter">{{ $cart_item->nameproduct }}</td>
                            <td class="fixcenter">{{ $cart_item->price }}</td>
                            <input type="hidden" name="idproduct" value="{{ $cart_item->idproduct }}">
                            <td class="fixcenter">
                                <input aria-label="quantity" class="input-qty" max="99" min="1" name="quantity"
                                    type="number" value="{{ $cart_item->quatifier }}">
                            </td>
                            <td class="fixcenter">{{ number_format($cart_item->quatifier * $cart_item->price, 2) }}</td>
                            @php
                            $total_price += $cart_item->quatifier * $cart_item->price;
                            $total_product += 1;
                            @endphp
                            <td class="fixcenter">
                                <div class="fixflex">
                                    <button class="btnsave3">Update</button>
                        </form>
                        <p class="fixmar">|</p>
                        <a class="btnsave"
                            href="{{ route('cart.delete', ['idproduct' => $cart_item->idproduct]) }}">Delete</a>
        </div>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        <div class="footright">
            <!-- <div class="pay">
                    <p class="txtsp" id="cbxsl">Select(0)</p>
                    <button class="btnpay">Deselect</button>
                </div> -->
            <form action="{{ route('deleteall') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btnpay">Delete All</button>
            </form>
            <div class="pay">
                <p class="txtsp" id="cbxsl2">Product({{$total_product}}):</p>
                <p class="txtsp">{{ number_format($total_price, 2) }}$</p>
                <form action="{{ route('cart.pay') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$total_price}}" name="pay">
                    <button class="btnpay" type="submit">Payment</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    
    @extends('layouts.Foot')
    <script>
    $(document).ready(function() {
        var isHidden = true;
        var balance = {
            {
                $user - > balance
            }
        };

        $('#eye1, #eye2').click(function() {
            if (isHidden) {
                $("#eye2").hide();
                $("#eye1").show();
                $('#balance').text(balance.toLocaleString('en-US', {minimumFractionDigits: 2}) + '$');
                isHidden = false;
            } else {
                $("#eye1").hide();
                $("#eye2").show();
                $('#balance').text('******');
                isHidden = true;
            }
        });
    });

    
    </script>
</body>

</html>