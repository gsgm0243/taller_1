
<?php
    include_once dirname(__FILE__) . '/conection.php';
    
    $sql = "CREATE TABLE Persons 
    (
      id INT NOT NULL AUTO_INCREMENT, 
      PRIMARY KEY(id),
      identification INT,
      name CHAR(15),
      lastname CHAR(15),
      email CHAR(200),
      age INT
    )";

    if (mysqli_query($con, $sql)) {
        echo "Tabla Persons creada correctamente";
    } else {
        echo "Error en la creacion " . mysqli_error($con);
    }
?>