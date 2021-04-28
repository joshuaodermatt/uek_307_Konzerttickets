<?php
    class CreateController {

        public function create() {

            $pbo = db();
            $statement = $pbo->prepare('SELECT * FROM concerts');
            $statement->execute();
            $result = $statement->fetchAll();
            require './app/Views/create.view.php';
        }

        public function add() {
            $lastname = trim($_POST['lastName']);
            $firstname = trim($_POST['firstName']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $concert = trim($_POST['concert']);
            $discount = trim($_POST['discount']);

            $errors = [];
            $ticket = new Ticket($lastname, $firstname, $email, $phone, $concert, $discount, 0);
            $ticket->createTicket();
        }

    }