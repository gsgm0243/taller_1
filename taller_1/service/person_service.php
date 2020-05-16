<?php
   
    include('../model/person_repository.php');
    include('../model/person.php');
    
    $identification = $_POST['identification'];
    $name = htmlentities($_POST['name']);
    $lastname = htmlentities($_POST['lastname']);
    $email = htmlentities($_POST['email']);
    $age =$_POST['age'];
   
    createPerson($identification, $name, $lastname, $email, $age);

    function createPerson($identification, $name, $lastname, $email, $age){
             $person = new Person($identification, $name, $lastname, $email, $age);
             findByIdentification($person);
    }
?>