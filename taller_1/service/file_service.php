<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <title></title>
    </head>

<?php
	$str_pagina = "";
	if ($_FILES["file"]["error"] > 0){
		$str_pagina.="Error: " . $_FILES["file"]["error"] . "<br>";
	}
	else  {
		$str_pagina.= "Nombre: " . $_FILES["file"] ["name"] . "<br>";
		$str_pagina.= "Tipo: " . $_FILES["file"]["type"] . "<br>";
		$str_pagina.= "Tamaño: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	}
	echo "<br>";
	echo "<div class=\"form-group col-md-8\">";
	echo $str_pagina;
        if (!file_exists('../files/')) {
           mkdir('../files/',0777,true);
        }
        move_uploaded_file($_FILES["file"]["tmp_name"],"../files/".$_FILES["file"]["name"]);
		echo "Guardado en: " . "taller/files/" . $_FILES["file"]["name"];
	echo "<br>";
	echo "<br>";
	echo "<input class=\"btn btn-primary\" onclick=\"location.href='../view/gestorPersonas.html'\" type=\"button\" value=\"Gestor Personas\">";
	echo "</div>";
?>

    </body>
</html>