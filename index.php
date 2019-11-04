<?php
ob_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="view/css/css.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="view/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="view/css/custom.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-10 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5 tela" >
        <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-12">
            <div class="p-5">
                <br><br><br><br>
                <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                </div>
                <form class="user" action="controller/ccUsuario.php" method="POST">
                <div class="form-group">
                    <input name="user" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nome de usuário">
                </div>
                <div class="form-group">
                    <input name="pass" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha">
                </div>

                <div class="botones">
                        <button type="submit" class="btn btn-primary" name='login'>Autenticar</button>
                    </div>
                <hr>
                
                </form>
                <div class="text-center">
                <a class="small" href="{{ route('password.request')}}">Esqueceu a senha?</a>
                </div>

                <br><br><br><br>
            </div>
            </div>
        </div>
        </div>
    </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

