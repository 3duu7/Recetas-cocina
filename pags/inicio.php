<!DOCTYPE html>
<html>
<head>
</head>
<div>
	<fieldset>
		<h1 class="inicioRegistro">Login</h1>
			<form method="POST" action="index.php?p=inicio" id="login" >
				<label Mail class="inicio"></label>
					<input class="inicio" type="text" name="m" ><br>
				<label Contraseña class="inicio"></label>
					<input class="inicio" type="password" name="p1"><br>
					<input class="btn1" type="submit" name="login"><br>
			</form>
	</fieldset>

		<br>

	<fieldset>
		<h1 class="inicioRegistro">¿Te has registrado ya?</h1>
			<form method="POST" action="index.php?p=inicio" id="login">
				<label Usuario class="inicio"></label>
					<input class="inicio" type="text" name="n"><br>
				<label mail class="inicio"></label>
					<input class="inicio" type="mail" name="m"><br>
				<label Contraseña class="inicio"></label>
					<input class="inicio" type="password" name="p1"><br>
				<label Repite la contraseña class="inicio"></label>
					<input class="inicio" type="password" name="p2"><br>
					<input class="btn1" type="submit" name="registro">
			</form>
	</fieldset>
</div>
</html>