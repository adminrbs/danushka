<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Document</title>
</head>

<body>
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">PraRoz</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">ABOUT</a></li>
                    <li><a href="#">SERVICE</a></li>
                    <li><a href="#">DESIGN</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>

            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <button class="btn">Search</button></a>
            </div>

        </div>
        <div class="content">
            <h1>Web Design & <br><span>Development</span> <br>Course</h1>
            <p class="par">Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Sunt neque
                 expedita atque eveniet <br> quis nesciunt. Quos nulla vero consequuntur, fugit nemo ad delectus
                <br> a quae totam ipsa illum minus laudantium?</p>

                <button class="cn"><a href="#">JOIN US</a></button>

                <div class="form">

                    <h2>Login Here</h2>
                    <input id="txtEmail" type="email" name="email" placeholder="Enter Email Here">
                    <input id="txtPassword" type="password" name="" placeholder="Enter Password Here">
                    <span id="erroeMsg" class="text-danger font-weight-bold text-sm spanError"></span>
                    <button id="submitform"  type="submit" class="btnn"><a href="#">Login</a></button>

                    <p class="link">Don't have an account<br>
                    <a href="#">Sign up </a> here</a></p>
                    <p class="liw">Log in with</p>

                    <div class="icons">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                    </div>

                </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <link href="maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/login.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script>


    </script>
</body>

</html>




