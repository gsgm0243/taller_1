<!DOCTYPE html>
<html>
    <head>
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
            
            <title></title>
        </head>
    </head>
    <body>
     <h2 style="margin-top: 15px;"> Personas </h2><br>
     <div class="form-group col-md-8">
        <?php
            include('../database/config.php');
            $str_datos = "";
            $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
            
            if (mysqli_connect_errno()) {
                $str_datos.= "Error en la conexión: " . mysqli_connect_error();
            }
            
            $str_datos.='<table class="table table-hover table-bordered">';
            $str_datos.='<tr>';
            $str_datos.='<th>Cédula</th>';
            $str_datos.='<th>Nombre</th>';
            $str_datos.='<th>Apellido</th>';
            $str_datos.='<th>Edad</th>';
            $str_datos.='<th>Email</th>';
            $str_datos.='</tr>';
            
            $order = $_POST['order'];
            $form = $_POST['form'];
            $sql = "SELECT * FROM Persons ORDER BY $order ".$form;              
            
            $resultado = mysqli_query($con,$sql);
            while($fila = mysqli_fetch_array($resultado)) {
              $str_datos.='<tr>';
              $str_datos.= "<td>".$fila['identification']."</td>
              <td>".$fila['name']."</td>
              <td>".$fila['lastname']."</td>
              <td>".$fila['age']."</td>
              <td>".$fila['email']."</td>";
              $str_datos.= "</tr>";
            }
            
            $str_datos.= "</table>";
            echo $str_datos;
            
            mysqli_close($con);
        ?>
     </div>   
     <input class="btn btn-link" onclick="location.href='gestorPersonas.html'" type="button" value="< Gestor Personas">
    </body>
</html>