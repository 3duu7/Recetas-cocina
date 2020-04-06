<?php
	if( isset($_POST['login']) ){
		$nom = $_SESSION['nombre'];
	}
?>

<nav>
	<ul>
	    <li class="menuli"><a <?= $menuClass[0] ?> href="index.php">Alimentos</a></li>

	    <li class="menuli"><a <?= $menuClass[1] ?> href="index.php?p=legumbre">Legumbres</a></li>

	    <li class="menuli"><a <?= $menuClass[2] ?> href="index.php?p=arroz">Arroces</a></li>

	    <li class="menuli"><a <?= $menuClass[3] ?> href="index.php?p=carne">Carnes</a></li>

	    <li class="menuli"><a <?= $menuClass[4] ?> href="index.php?p=pescado">Pescados</a></li>

	    <li class="menuli"><a <?= $menuClass[5] ?> href="index.php?p=huevo">Huevos</a></li>

	    <li class="menuli"><a <?= $menuClass[6] ?> href="index.php?p=pasta">Pastas</a></li>

	    <li class="menuli"><a <?= $menuClass[7] ?> href="index.php?p=caldo">Salsas</a></li>

	    <li class="menuli"><a <?= $menuClass[8] ?> href="index.php?p=verdura">Verduras</a></li>

	    <li class="menuli"><a <?= $menuClass[9] ?> href="index.php?p=bebida">Bebidas</a></li>
	 
	    <li class="menuli"><a <?= $menuClass[10] ?> href="index.php?p=inicio">Iniciar Sesión</a></li>

	    <li class="menuli"><a <?= $menuClass[11] ?> href="index.php?p=registro">Cerrar sesión</a></li>
	
	  	<li class="menuli" id="cuenta"> <?= $_SESSION['nombre'] ?> 
	  	</li>
	</ul>
</nav>

<script>
window.onscroll = function() {myFunction()};

var nav = document.getElementById("myScroll");
var scroll = nav.offsetTop;

	function myFunction() {
	  if (window.pageYOffset > scroll) {
	    nav.classList.add("scroll");
	  } else {
	    nav.classList.remove("scroll");
	  }
	}
</script>