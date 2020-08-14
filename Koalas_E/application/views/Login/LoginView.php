<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login - Koalas</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/Login/style.css">
  <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css">

</head>
<body>
  <!-- partial:index.partial.html -->
  <div class="form">

    <ul class="tab-group">
      <li class="tab active"><a href="#signup">Registrarse</a></li>
      <li class="tab"><a href="#login">Iniciar Sesion</a></li>
    </ul>

    <div class="tab-content">
      <div id="signup">   
        <h1>Registrarse</h1>

        <form action="<?= base_url() ?>index.php/User/NewCustomer" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                Nombre<span class="req">*</span>
              </label>
              <input type="text" id="txtNombre" name="txtNombre" required autocomplete="off" />
            </div>

            <div class="field-wrap">
              <label>
                Apellido<span class="req">*</span>
              </label>
              <input type="text" id="txtApellido" name="txtApellido" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Correo Electronico o Usuario<span class="req">*</span>
            </label>
            <input type="text" id="txtUser" name="txtUser" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <input type="password" id="txtPass" name="txtPass" required autocomplete="off"/>
          </div>

          <button type="submit" class="button button-block"/>Registrarse</button>

        </form>

      </div>

      <div id="login">   
        <h1>Iniciar Sesion</h1>

        <form action="<?= base_url() ?>index.php/Login/validar" method="post">

          <div class="field-wrap">
            <label>
              Usuario<span class="req">*</span>
            </label>
            <input type="text" id="txtEmail" name="txtEmail" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <input type="password" id="txtPassword" name="txtPassword" required autocomplete="off"/>
          </div>

          <button class="button button-block"/>Iniciar Sesion</button>

        </form>

      </div>

    </div><!-- tab-content -->

  </div> <!-- /form -->
  <!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
  </script><script  src="<?= base_url() ?>assets/Login/script.js"></script>
  <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
  <script>
    $(document).ready(function(){
      <?php
        if (isset($_GET["result"])) {
          switch ($_GET["result"]) {
            case 0:
              # code...
              echo 'swal("Error", "Usuario no encontrado", "error")';
              break;
            case 1:
              echo 'swal("Error", "Contraseña Incorrecta", "error")';
              # code...
              break;
            case 2:
              echo 'swal("Error", "El usuario ya existe", "warning")';
              # code...
              break;
            case 3:
              echo 'swal("Correcto", "Usuario ingresado correctamente", "success")';
              # code...
              break;
            default:
              # code...
              break;
          }
        }
      ?>
    });
  </script>
</body>
</html>
