<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         
            include('../model/person_repository.php');
            
            $str_datos = "";
            $str_datos.='<table border="1" style="width:100%">';
            $str_datos.='<tr>';
            $str_datos.='<th>Cédula</th>';
            $str_datos.='<th>Nombre</th>';
            $str_datos.='<th>Apellido</th>';
            $str_datos.='<th>Email</th>';
            $str_datos.='<th>Edad</th>';
            $str_datos.='</tr>';
            while($fila = mysqli_fetch_array(findAll())) {
              $str_datos.='<tr>';
              $str_datos.= "
              <td>".$fila['identification']."</td>
              <td>".$fila['name']."</td>
              <td>".$fila['lastame']."</td>
              <td>".$fila['email']."</td>
              <td>".$fila['age']."</td>";
              $str_datos.= "</tr>";
            }
            $str_datos.= "</table>";
            echo $str_datos;
        ?>
    </body>
</html>