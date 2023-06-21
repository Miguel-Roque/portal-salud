<?php
  if ($_POST) {
    header('Location:inicio.php');
  }
?>
<!doctype html>
<html lang="es">
  <head>
    <link rel="icon" href="../img/logo.ico">
    <title>Portal Alimentacion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/logo.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <section class="vh-100 sd backgraund">
		<div class="container py-5 h-100">
		  <div class="row d-flex justify-content-center align-items-center h-100">
			  <div class="col col-xl-10">
			    <div class="card" style="border-radius: 1rem;">
				    <div class="row g-0 border-r">
				      <div class="col-md-6 col-lg-5 d-none d-md-block">
					      <img src="https://usil-blog.s3.amazonaws.com/PROD/blog/image/nutricionistas-fundamental-equipo-salud.jpg"
					      alt="login form" class="img-fluid img-login-1" style="border-radius: 1rem 0 0 1rem; height: 100%;" />
				      </div>
				        <div class="col-md-6 col-lg-7 d-flex align-items-center">
					        <div class="card-body p-4 p-lg-5 text-black as-de">
					          <form id="formulario1" method="POST">
						          <div class="d-flex align-items-center mb-3 pb-1">
						            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
						            <span class="h1 fw-bold mb-0 title-sd">Portal alimentacion</span>
						          </div>
						          <h5 class="fw-normal mb-3 pb-3 title-sd" style="letter-spacing: 1px;">Inicia sesión en su cuenta</h5>
						          <div class="form-outline mb-4">
						            <input type="text" class="form-control input-zxz" id="username" name="usuario"
						            placeholder="Ingresa usuario"/>
						            <label class="form-label">Usuario</label>
						          </div>
						          <div class="form-outline mb-4">
						            <input type="password" class="form-control" id="password" name="contrasenia"
						            placeholder="Contraseña"/>
						            <label class="form-label">Contraseña</label>
						          </div>
						          <div class="pt-1 mb-4">
						            <button class="btn btn-dark btn-lg btn-block boton-color" type="submit">Iniciar</button>
						          </div>
						          <a class="small text-muted title-sd" href="#!">¿Has olvidado tu contraseña?</a>
						          <p class="mb-5 pb-lg-2 title-sd" style="color: #393f81;">¿No tienes una cuenta? <a href="#!"
							        style="color: #393f81;">Registrate aquí</a></p>
					          </form>
                  </div>
		            </div>
					    </div>
		        </div>
		      </div>
        </div>
	    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>