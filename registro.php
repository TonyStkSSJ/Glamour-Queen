<html>
    <head>
	<title> indexbutbetter </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <style>
            *{
                box-sizing: border-box;
            }

            body{
                align-items: center;
                color: #fff;
                display: flex;
                flex-direction: column;
                font-family: "Arial", sans-serif;
                justify-content: center;
                height: 100vh;
                overflow: hidden;
                margin: 0;
            }

            p{ color: #bd7878 }
        </style>
    </head>
    <body>
        <div class="form-container">
            <h1> Crear cuenta </h1>
            <form action="../php/registros.php" method="post" id="signinThingy">
                <div class="form-control">
                    <input type="text" name="username" required>
                    <label> Nombre de Usuario </label>
                </div>
                <div class="form-control">
                    <input type="email" name="email" required>
                    <label> Correo electrónico </label>
                </div>
                <div class="form-control">
                    <input type="password" name="password" required>
                    <label> Contraseña </label>
                </div>
                <div class="form-control">
                    <input type="password" name="cpassword" required>
                    <label> Confirmar Contraseña </label>
                </div>
                <button class="form-btn"> Enviar </button>
                <p class="form-text"> ¿Ya tienes una cuenta?
                    <a href="login.php"> Iniciar sesión </a>
                </p>
            </form>
        </div>
        <script src='../js/js.js'></script>
    </body>
</html>