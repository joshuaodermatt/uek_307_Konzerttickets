<?php
    class CreateController {

        public function create() {

            require './app/Views/create.view.php';
        }

        public function add() {
            $lastname = $_POST['lastName'];
            $firstname = $_POST['firstName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $concert = $_POST['concert'];
            $discount = $_POST['discount'];


        }

    }