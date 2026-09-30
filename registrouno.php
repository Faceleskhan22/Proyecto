
 <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
            
          
    <main>
    <form method="POST" action="registro.php" class="registro">
        <img src="IMAGENES/perfil.png" alt="">
        <h1>Crear una cuenta </h1>
        <div class="in">
        <label>Nombre de Usuario</label>
        <input type="text" name="usuario">
        </div>
        <div class="in">
        <label>Email</label>
        <input type="text" name="Email">
        </div>
        <div class="in">
        <label>Contraseña</label>
        <input type="password" name="clave">
        </div>
        <div class="in">
        <label>Confirmar Contraseña</label>
        <input type="password" name="">
        </div>
        <div class="in">
        <label>Calle</label>
        <input type="text" name="calle" placeholder="Ramon Cabrero">
        </div>
        <div class="in">
        <label>Numero</label>
        <input type="number" name="num" placeholder="3650">
        </div>
        <div class="in">
        <label>Localidad</label>
        <input type="text" name="local" placeholder="Lanus">
        </div>
        <button type="submit" name="enviar" class="bot">Crear</button>
        
    <p>¿Ya tienes cuenta? <a href="inicio.html">Iniciar sesión</a></p>
    </form>
</main>

</body>
</html>
