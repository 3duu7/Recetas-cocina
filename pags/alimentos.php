<head>
	<h1>Tipos de alimentos</h1>
</head>
<body>
	<div>
		<h2>Legumbres<h2>
		<h2>Arroces</h2>
		<h2>Carnes</h2>
		<h2>Pescados</h2>
		<h2>Huevos</h2>
		<h2>Pasta</h2>
		<h2>Salsas</h2>
		<h2>Verduras</h2>
		<h2>Bebidas</h2>
	</div>

	<div class="mensajitos">
			<hr>
			<h2><?= $numCom ?> Comentarios</h2>
				<?= $mensajes ?>		
		</div>	

		<form method="POST" action="index.php"  >
			<br><input class="comentarios" type="text" name="nuevo" placeholder="Escribe un mensaje" >
		</form>
</body>
	</div>