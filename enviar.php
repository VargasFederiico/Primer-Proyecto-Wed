<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> PHP 3 - Mail </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="css/estilos.css" />
	</head>
	<body>
		<div id="contenedor">
			<div class="mb-5">
				<h1>PHP 3 - Mail</h1>
				<h3 class="lead">Método POST</h3>
			</div>
			<div class="form">
				
			<div class="contenido">

                <h2>Datos enviados...</h2>
            
                <?php   

                //$_GET / $_POST -> $_REQUEST

                //mostrar la cantidad de datos enviados por POST
                $contarDatos = count($_POST);
                $contarDatos = count($_REQUEST);
                echo $contarDatos;

                //recorremos el array POST
                foreach ($_REQUEST as $datos) {
                    # code...
                    echo $datos;
                }

                //Desplegar el array de datos -> reasignando variables
                //$_REQUEST['nameDelCampo']
                $nombre = $_REQUEST['nombre'];

                if (filter_var($_REQUEST['correo'], FILTER_VALIDATE_EMAIL)) {
                    //echo "Esta dirección de correo ($email_a) es válida.";
                    $email = $_REQUEST['correo'];
                }
                
                $mensaje = $_REQUEST['mensaje'];
                $fecha = date("d/m/Y h:m");

                //Validacion de datos por PHP
                if($_REQUEST['nombre'] == "" or $email == undefined or $_REQUEST['mensaje']==""){
                    echo "No se puede realizar el envio, porque faltan datos";
                }else{     
                
                //Definimos los datos para el envio
                $destino = 'federicovargas@live.com';
                $asunto = "Nuevo comentario desde el sitio";
                $cuerpoMensaje = "<h2>Nuevo Mensaje</h2><hr><p>Nombre: ".$nombre."</p><p>correo:".$correo."</p><p>mensaje:".$mensaje."</p>";
                //Verificacion del cuerpo del mensaje
                //echo $cuerpoMensaje;

                //Envio de los datos por Mail
                $envio = mail($destino,$asunto,$cuerpoMensaje); 

                //Verificacion del envio
                if($envio === true) {
                    echo "<h2>Gracias ".$nombre." por contactarnos </h2><p>Le reenviaremos los datos a su email</p>";
                }else{
                    echo "<p>hubo un error en el envio, por favor escribinos a <a href='mailto:".$destino."'>".$destino."</a>";
                }
                //Mail de agradecimiento
                $mensajeGracias = 'Hola '.$nombre." gracias por usar el formulario del sitio. <br> le adjuntamos una copia de su mensaje: ".$cuerpoMensaje;

                $envio2 = mail($email,'Gracias por escribirnos',$mensajeGracias);

            }

                ?>
            
            </div>

				


			</div>

		</div>
        <div class="text-center">
    
				&copy; <!-- incluir fecha con PHP --> - Todos los derechos reservados
			</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>