<html lang="es">
    <head>
        <title> index </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css">
        <style>
            *{
                box-sizing: border-box;
            }

            body{
                font-family: "Arial", sans-serif;
                color: #fff;
                display: flex;
                flex-direction: column;
                align-items: center;
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
            <h1> Ingresar </h1>
            <form action="../php/loguin.php" method="post" id="loginThingy">
                <div class="form-control">
                    <input type="email" name="email" required>
                    <label> Correo Electrónico </label>
                </div>
                <div class="form-control">
                    <input type="password" name="password" required>
                    <label> Contraseña </label>
                </div>
                <button class="form-btn"> Enviar </button>
                <p class="form-text"> ¿No tiene una cuenta?
                    <a href="registro.php"> ¿Crear cuenta? </a>
                </p>
            </form>
        </div>
        <script src="./js/js.js "> </script>
    </body>
</html>