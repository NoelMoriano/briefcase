<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Técnicos - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crear cuenta</h1>
              </div>
              <form class="user" method="post" action="controllers/registerUser.php">

              <div class="form-group row">
                                            <div class="col-sm-6 mb-4 mb-sm-0">
                                            <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese nombres"
                                                       hidden
                                                       name="userId">
                                                        <div>
                                                            <label for="">Nombres:</label>
                                                                <input type="text"
                                                            class="form-control input-form-small"
                                                            placeholder="Ingrese nombres"
                                                            name="names">
                                                        </div>
                                                       
                                            </div>
                                            <div class="col-sm-6 mb-4 mb-sm-0">
                                                        <div>
                                                            <label for="">Apellidos:</label>
                                                            <input type="text"
                                                            class="form-control input-form-small"
                                                            placeholder="Ingrese apellidos"
                                                            name="lastName">
                                                        </div> 
                                            </div>                                 
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="">Email:</label>
                                                <input type="email"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese email"
                                                       name="email">
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="">Contraseña:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese password"
                                                       name="password" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Edad:</label>
                                                <input type="number"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su edad"
                                                       name="age" >
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Fecha cumpleaños:</label>
                                                <input type="date"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese fecha de cumpleaños"
                                                       name="birthdayDate" >
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Dirección:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su dirección"
                                                       name="direction" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="">Profesion:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su profesion"
                                                       name="profession" >
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="">Telefono:</label>
                                                <input type="number"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese teléfono"
                                                       name="phone" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="">Intereses:</label>
                                            <div class="col-sm-12">
                                                <label for="">Separe sus intereses por giones (,)</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese Intereses"
                                                       name="interests" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="">Descripción profesional</label>
                                              <textarea class="form-control"
                                                        style="color: #444"
                                                        placeholder="Ingrese descripción"
                                                        name="description">
                                              </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Facebook:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su FB"
                                                       name="userFb" >
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Twitter:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su Twitter"
                                                       name="userTwitter" >
                                            </div>
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                            <label for="">Linkedin:</label>
                                                <input type="text"
                                                       class="form-control input-form-small"
                                                       placeholder="Ingrese su Linkedin"
                                                       name="userLinkedin">
                                            </div>
                                        </div>

                <button type="submit" class="btn btn-primary btn-user btn-block" name="saveUser">
                  Registrar cuenta
                </button>
                
                <!--<a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>-->
              </form>
              <!--<hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
