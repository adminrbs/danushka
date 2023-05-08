<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<style>
    body {
        background-image: url('assets/images/backgrounds/boxed_bg_retina.png');
        background-repeat: no-repeat;
        background-size: cover;
    }


    .login-container {
        width: 100vh;
        margin: 2%;
        background-color: white;
    }


    .login-form {
        margin-top: 30vh;

    }

    .image {
        background-image: url('assets/images/demo/images/blog2.jpg');
        background-size: cover;
        height: 100vh;
    }

    .btnSubmit {
        width: 100%;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }
</style>

<body>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form">
                <div>
                    <h3>Login Form </h3>
                </div>
                <form class="" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder=" Email" value="" id="txtEmail" required />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password " value="" id="txtPassword" required/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btnSubmit" value="" id="submitform">LOG IN</button>
                    </div>
                    <div class="form-group mt-5">
                        <p class="text-muted text-center">Version 2023.01.0010</p>
                    </div>
                </form>
            </div>
            <div class="col-md-6 image">

            </div>
        </div>
    </div>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/login.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script>


    </script>
</body>

</html>
