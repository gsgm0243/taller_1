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
   
    include('../database/config.php');

    function findByIdentification($person){

        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);
        $sql = "SELECT * FROM Persons WHERE identification = $person->identification";
        $result = mysqli_query($con,$sql);
        $fila = mysqli_fetch_array($result);
        if(isset($fila['name'])){
           upDate($person);
        }
        else{
            create($person);
        }
        mysqli_close($con);
    }

    function create($person){
  
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);

        $sql = "INSERT INTO Persons (identification, name, lastname, email, age) VALUES ($person->identification,'$person->name', '$person->lastname','$person->email', $person->age)";
        
        if(mysqli_query($con,$sql)){
            echo "<div class=\"form-group col-md-8\">";
            echo "<br>";
            echo "<p>La persona se ha creado satisfactoriamente</p>";
            echo "<br>";
            echo "<input class=\"btn btn-primary\" onclick=\"location.href='../view/gestorPersonas.html'\" type=\"button\" value=\"Gestor Personas\">";
            echo "</div>";
        }
        else{
            echo "<div class=\"form-group col-md-8\">";
            echo "<br>";
            echo "<p>Error creando persona</p>";
            echo "<br>";
            echo "<input class=\"btn btn-primary\" onclick=\"location.href='../view/gestorPersonas.html'\" type=\"button\" value=\"Gestor Personas\">";
            echo "</div>";
        }
        mysqli_close($con);

    }

    function upDate($person){

        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);

        $sql="UPDATE Persons
        SET name = '$person->name', lastname= '$person->lastname', email = '$person->email', age = $person->age
        WHERE identification = $person->identification";

        if(mysqli_query($con,$sql)){
            echo "<div class=\"form-group col-md-8\">";
            echo "<br>";
            echo "<p>La persona se ha actualizado satisfactoriamente</p>";
            echo "<br>";
            echo "<input class=\"btn btn-primary\" onclick=\"location.href='../view/gestorPersonas.html'\" type=\"button\" value=\"Gestor Personas\">";
            echo "</div>";
        }
        else{
            echo "<div class=\"form-group col-md-8\">";
            echo "<br>";
            echo "<p>Error actualizando persona</p>";
            echo "<br>";
            echo "<input class=\"btn btn-primary\" onclick=\"location.href='../view/gestorPersonas.html'\" type=\"button\" value=\"Gestor Personas\">";
            echo "</div>";
        }
        mysqli_close($con);
    }

    function Delete($id){

        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, NOMBRE_DB);

        $sql = "DELETE FROM Persons WHERE identification = $id ";

        if(mysqli_query($con,$sql)){
           
           echo "<div class=\"form-group col-md-8\">";
           echo "<br>";
           echo "<p>La persona se ha eliminado satisfactoriamente</p>";
           echo "<br>";
           echo "<input class=\"btn btn-primary\" onclick=\"location.href='../view/gestorPersonas.html'\" type=\"button\" value=\"Gestor Personas\">";
           echo "</div>";
        }
        else{
            echo "<div class=\"form-group col-md-8\">";
            echo "<br>";
            echo "<p>Error elimando persona</p>";
            echo "<br>";
            echo "<input class=\"btn btn-primary\" onclick=\"location.href='../view/gestorPersonas.html'\" type=\"button\" value=\"Gestor Personas\">";
            echo "</div>";
        }
        mysqli_close($con);
    }
?>
    </body>
</html>