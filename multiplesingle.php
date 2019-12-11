<!-- Si el tema tiene varios singles.php debes renombrar este archivo a single.php -->
<?php
	if (in_category($catnumber)) { // Si el post est{a dentro de $catnumber jalará single-$nombrecat.php cómo vista
		include(TEMPLATEPATH . '/single-$nombrecat.php');
	} else { 
	include(TEMPLATEPATH . '/single-default.php'); // Si no está en ninguna categoría en específico este será el default
} ?>