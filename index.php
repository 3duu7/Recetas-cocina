<?php
	session_start();

	$serv = "localhost";
	$user = "usuariBD";
	$pass = "qwerty";

	$c = new mysqli($serv, $user, $pass);
	
	$sql = "CREATE DATABASE IF NOT EXISTS comentarios";
	$c->query($sql);
	$c->close();

	$c = new mysqli($serv, $user, $pass, "comentarios");

	$sql = "CREATE TABLE IF NOT EXISTS Usuari(
				nom VARCHAR(50),
				mail VARCHAR(50) PRIMARY KEY,
				contrasenya VARCHAR(50)
				)CHARACTER SET=utf8";
	$c->query($sql);

	$sql = "CREATE TABLE IF NOT EXISTS Mensaje(
				id INT(20) AUTO_INCREMENT,
				hora TIMESTAMP,
				usuario VARCHAR(50),
				contenido TEXT,
				receta_id TEXT,
				PRIMARY KEY(id),
				FOREIGN KEY(usuario) REFERENCES Usuari(nom)
			)CHARACTER SET=utf8";
	$c->query($sql);

############################################ NUM COMEN

	$sql = "SELECT * from Mensaje";
	$resultado = $c->query($sql);
	$numCom = $resultado->num_rows;
	
############################################ INICIO SESION

	if( isset($_POST['registro']) ){
		if( $_POST['p1'] == $_POST['p2'] ){

			$n = $_POST['n'];
			$m = $_POST['m'];
			$p = $_POST['p1'];
			$sql="INSERT INTO Usuari(nom,mail,contrasenya)
					VALUES('$n','$m','$p')";
			$c->query($sql);
		}
	}

	if( isset($_POST['login']) ){

		$m = $_POST['m'];
		$p = $_POST['p1'];
		$p2 = "";
		$n = "";
		$us= "";
		
		$sql ="SELECT contrasenya, nom FROM Usuari
				WHERE mail='$m' ";
		$resultado = $c->query($sql);

	if( $resultado->num_rows>0 ){
		while($row = $resultado->fetch_assoc()){
			$p2 = $row['contrasenya'];
			$n = $row['nom'];
		}
	}
	
	if($p == $p2){
		$_SESSION['nombre'] = $n;
		header("Location: index.php");
    	}
	}


############################################ COMENTARIOS


	if( isset($_POST['nuevo']) ){

		$us = $_SESSION['nombre'];
		$co = htmlspecialchars($_POST['nuevo']);
		$sql = "INSERT INTO Mensaje(usuario,contenido)
					VALUES('$us','$co')";
		$c->query($sql);
	}

	$sql = "SELECT * FROM Mensaje ";
	$resultado = $c->query($sql);

	$mensajes = '';
	if( $resultado->num_rows>0 ){

		$fecha = "";
		while( $row=$resultado->fetch_assoc() ){
			
			if( $fecha!=date("d/m/Y",strtotime($row['hora'])) ){
				$fecha = date("d/m/Y",strtotime($row['hora']) );
							
				$mensajes .= '<div class="fecha">';
				if( $fecha==date("d/m/Y") ){
					$mensajes .= '<br><span>HOY</span></br>';
					$mensajes .= '<br><strong>'.$row['usuario'].' </strong>';
					$mensajes .= date("H:i",strtotime($row['hora']));
					$mensajes .= '<br><span>'.$row['contenido'].' </span>';	
					
					}else{
						$mensajes .= ' <span>'.$fecha.'</span>' ;
					}}else{
						$mensajes .= '<div>';
						$mensajes .= '<br><strong>'.$row['usuario'].' </strong>';
						$mensajes .= date("H:i",strtotime($row['hora']));
						$mensajes .= '<br><span>'.$row['contenido'].' </span>';	
			}
		}
	}


############################################

	$pag = "alimentos";
	$menuClass = array(" class='coloreado' ",
					   "",
					   "",
					   "",
					   "",
					   "",
					   "",
					   "",
					   "",
					   "",
					   "",
					   "",
					   "");

	if( isset($_GET['p']) ){
		$pag = $_GET['p'];

		switch ($_GET['p']) {

			case 'legumbre':
				getCategory(1);
				break;
			
			case 'arroz':
				getCategory(2);
				break;
			
			case 'carne':
				getCategory(3);
				break;

			case 'pescado':
				getCategory(4);
				break;
			
			case 'huevo':
				getCategory(5);
				break;

			case 'pasta':
				getCategory(6);
				break;
			
			case 'caldo':
				getCategory(7);
				break;

			case 'verdura':
				getCategory(8);
				break;

			case 'bebida':
				getCategory(9);
				break;

			case 'inicio':
				getCategory(10);
				break;

			case 'registro':
				getCategory(11);
				break;

			default:
				break;
		}
	}
		if( isset($_GET['p']) ){

		switch ($_GET['p']) {

		####LEGUMBRES#####
			case 'pochas':
				getCategory(1);
				break;
			
			case 'lentejas':
				getCategory(1);
				break;
		
			case 'fabada':
				getCategory(1);
				break;

			case 'ensaladaalubias':
				getCategory(1);
				break;
			
			case 'ensaladagarbanzos':
				getCategory(1);
				break;
			
			case 'espinacasygarbanzos':
				getCategory(1);
				break;

		####ARROZ#####
			case 'paella':
				getCategory(2);
				break;

			case 'arrozconleche':
				getCategory(2);
				break;

			case 'arrozacelgas':
				getCategory(2);
				break;

			case 'arrozverduras':
				getCategory(2);
				break;

			case 'cubana':
				getCategory(2);
				break;

		####CARNE#####
			case 'croquetas':
				getCategory(3);
				break;

			case 'guiso':
				getCategory(3);
				break;

			case 'pollo':
				getCategory(3);
				break;

		####PESCADO#####
			case 'bonito':
				getCategory(4);
				break;
			
			case 'lubina':
				getCategory(4);
				break;
		
			case 'salmon':
				getCategory(4);
				break;

			case 'bacalao':
				getCategory(4);
				break;
			
			case 'rape':
				getCategory(4);
				break;
			
			case 'dorada':
				getCategory(4);
				break;

		####HUEVOS#####
			case 'huevosestrellados':
				getCategory(5);
				break;

			case 'huevosplato':
				getCategory(5);
				break;

			case 'tortillapatatas':
				getCategory(5);
				break;

			case 'tortilla':
				getCategory(5);
				break;

			case 'huevosduros':
				getCategory(5);
				break;

			####PASTA#####
			case 'macarrones':
				getCategory(6);
				break;

			case 'espaguetis':
				getCategory(6);
				break;

			case 'raviolis':
				getCategory(6);;
				break;

			case 'canelones':
				getCategory(6);
				break;

			case 'fideua':
				getCategory(6);
				break;

		####SALSAS#####
			case 'barbacoa':
				getCategory(7);
				break;

			case 'bechamel':
				getCategory(7);
				break;

			case 'boloñesa':
				getCategory(7);
				break;

			case 'española':
				getCategory(7);
				break;

			case 'holandesa':
				getCategory(7);
				break;

			case 'mayonesa':
				getCategory(7);
				break;

			case 'pesto':
				getCategory(7);
				break;

			case 'sofrito':
				getCategory(7);
				break;

			case 'pimienta':
				getCategory(7);
				break;

		####VERDURAS#####
			case 'calabacin':
				getCategory(8);
				break;

			case 'gazpacho':
				getCategory(8);
				break;

			case 'salmorejo':
				getCategory(8);
				break;

			case 'Sopadetomate':
				getCategory(8);
				break;

		####BEBIDAS#####
			case 'sangria':
				getCategory(9);
				break;

			case 'limoncello':
				getCategory(9);
				break;

			case 'smoothie':
				getCategory(9);
				break;


			default:
					break;
		}
	}

############################################
	function getCategory($category) {
		global $menuClass;
		$menuClass[0]="";		
		$menuClass[$category]="class='coloreado' ";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet"  href="css/estilos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="jquery.min.js"></script>
		<script src="popper.min.js"></script>
		<script src="bootstrap.min.js"></script>
</head>

	<link rel="stylesheet"  href="css/estilos.css">
<body>

<?php 
	include 'pags/header.php'; 
	include 'pags/nav.php'; 
	include 'pags/'.$pag.'.php';   
?>
	
</body>
</html>