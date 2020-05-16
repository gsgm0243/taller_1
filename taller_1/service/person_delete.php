<?php
   
    include('../model/person_repository.php');
    include('../model/person.php');
    
    $identification = $_POST['identification'];
  
    deletePerson($identification);

    function deletePerson($identification){
             delete($identification);
    }
?>