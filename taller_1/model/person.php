<?php
    class Person{

        public $id;
        public $identification;
        public $name;
        public $lastname;
        public $email;
        public $age;
        function __construct($identification, $name, $lastname, $email, $age){
        $this->identification = $identification;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->age = $age;

        }
    }
?>