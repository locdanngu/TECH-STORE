<!DOCTYPE html>
<html lang="en">

<head>
    @extends('layouts.Link')
    <link rel="stylesheet" href="/css/Homepage.css">
    <title>Home Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home.page') }}"><img src="/images/logo.png" width='100'></a>
            <a class="navbar-brand" href="{{ route('home.page') }}"><img src="/images/logo2.png" height='45'></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a href="{{ route('login.page') }}" class="btn-login">Login</a>
                <a href="{{ route('signup.page') }}" class="btn-signup">Sign up</a>
            </div>
        </div>
    </nav>
    <div class="body">
        <p class="headbody">technology store</p>
        <p class="bodybody">for everyone</p>
        <p class="footbody">Specializes in quality electronics, ranging from phones and tablets to home appliances.
            Competitive prices, attentive service, and trustworthy reputation.</p>
        <div class="btn">
            <a class="btn2" href="{{ route('signup.page') }}" style="text-decoration:none">I'm new</a>
            <a class="btn2" href="{{ route('login.page') }}" style="text-decoration:none">Watch more</a>
        </div>
    </div>

    <div class="sample">
        <p class="mieuta">Oculus VR: "Discover the Thrills of Virtual Reality: Immerse in Realistic Virtual Worlds,
            Explore Diverse Applications, Experience Captivating Diversity, and Push the Boundaries of Reality to New
            Heights."</p>
        <img src="/images/sample.png" class="imgsample">
    </div>

    <div class="sample">
        <img src="/images/sample2.png" class="imgsample">
        <div class="loiich">
            <p class="mieuta2">ADVANCED OF GAMING MOUSE:</p>
            <p class="mieuta2">1. <span class="fixcl">High accuracy:</span> Gaming mouse improves accuracy in games.</p>
            <p class="mieuta2">2. <span class="fixcl">Fast response speed:</span> Gaming mouse reduces latency and
                enhances response speed.</p>
            <p class="mieuta2">3. <span class="fixcl">Multi-functionality:</span> Customizable buttons on gaming mouse
                allow for easy control.</p>
            <p class="mieuta2">4. <span class="fixcl">Convenient design:</span> Ergonomic design of gaming mouse reduces
                fatigue during long-term use.</p>
            <p class="mieuta2">5. <span class="fixcl">High compatibility:</span> Gaming mouse is compatible with various
                platforms and operating systems.</p>
            <p class="mieuta2">6. <span class="fixcl">Enhanced gameplay:</span> Gaming mouse improves gaming experience
                with unique features and customization.</p>
        </div>

    </div>

    @extends('layouts.Foot')
</body>

</html>