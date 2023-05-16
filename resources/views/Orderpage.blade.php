<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Orderpage.css">
    <title>My Purchase Order</title>
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
            <a class="linkus" href="{{ route('cart.page') }}">
                <i class="bi bi-cart"></i>
                <p class="fixtxt">My Cart</p>
            </a>
            <a class="linkus active" href="{{ route('order.page') }}">
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
            <!-- <div class="headright">
                <div class="sotien">
                    <p class="txtblc">Account balance: <span id="balance" style="font-weight:bold">******</span></p>
                    <i class="bi bi-eye-slash" id="eye1"></i>
                    <i class="bi bi-eye" id="eye2"></i>
                </div>
                <a href="{{ route('user.page') }}" class="naptien2">More Product</a>
                <button class="naptien">Recharge</button>
            </div> -->
            <table class="table table-dark">
                <thead>
                    <tr>
                        <!-- <th scope="col"><input type="checkbox" id="myCheckbox"></th> -->
                        <th scope="col">#</th>
                        <th scope="col">Sample</th>
                        <th scope="col">Name</th>
                        <th scope="col">Unit price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total price</th>
                        <th scope="col">Time Order</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart_items as $cart_item)
                    <tr class="space"></tr>
                    <tr>
                        <!-- <td class="fixcenter">
                            <input type="checkbox" name="cart_item[]" value="{{ $cart_item->idproduct }}"
                                class="cbxcon">
                        </td> -->
                        <th scope="row" class="fixcenter">{{ $loop->iteration }}</th>
                        <td><img src="{{ $cart_item->image }}" class="imgsp"></td>
                        <td class="fixcenter">{{ $cart_item->nameproduct }}</td>
                        <td class="fixcenter">{{ $cart_item->price }}</td>
                        <td class="fixcenter">{{ $cart_item->quatifier }}</td>
                        <td class="fixcenter">{{ number_format($cart_item->quatifier * $cart_item->price, 2) }}</td>
                        <td class="fixcenter">{{ $cart_item->created_at }}</td>
                        <td class="fixcenter" style="color:{{ $cart_item->status == 1 ? 'yellow' : ($cart_item->status == 2 ? '#0AD488' : '') }}">
                            {{ $cart_item->status == 1 ? 'Waiting' : ($cart_item->status == 2 ? 'Finish' : '') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @extends('layouts.Foot')
    <script>

    </script>
</body>

</html>