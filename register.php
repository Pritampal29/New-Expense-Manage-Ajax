<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">

    <link rel="stylesheet" href="css/fontawesome.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/templatemo-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Login</title>
    <style>
        .login{
            margin-top:40px;
            margin-bottom:40px;
        }
        .card-body{
            padding: 15px 25px;
        }
    </style>
</head>

<body>

    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header bg-warning text-center">
                            <h2>Registration</h2>
                        </div>
                        <div class="card-body">
                            <form class="form-group" id="registerForm" Method="POST" Action="./backend/reg_backend.php">
                                <label for="regName">Name</label>
                                <input type="text" name="uname" id="regName" class="form-control" required>
                                <label for="regEmail">Email Address</label>
                                <input type="email" name="uemail" id="regEmail" class="form-control">
                                <label for="regPassword">Password</label>
                                <input type="password" name="password" id="regPassword" class="form-control">

                                <input type="submit" name="Register" id="logBtn" class="btn btn-warning text-center mb-3">
                                <br>
                                <a href="login.php">Existing Member</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="footer">
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b><?php echo date('Y');?></b><br>
                    Design & Developed by : <a href="https://pritamcv.netlify.app" class="tm-footer-link">Pritam</a>
                </p>
            </div>
        </footer>
    </div>

</body>

</html>