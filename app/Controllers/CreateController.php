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
            $discount = trim($_POST['discount']) ?? null;

            $errors = [];

            if ($lastname === '' || $lastname === null) {
                array_push($errors, 'Bitte geben Sie einen Nachnamen an');
            }
            if ($firstname === '' || $firstname === null) {
                array_push($errors, 'Bitte geben Sie einen Vornamen an');
            }
            if ($email === '' || $email === null) {
                array_push($errors, 'Bitte geben Sie eine E-mail an');
            } elseif (!preg_match("/[^@]+@[^.]+\..+$/i", $email)) {
                array_push($errors, 'Bitte geben Sie eine Valide Email ein.');
            }
            if (!preg_match("/^(?:(?:|0{1,2}|\+{0,2})41(?:|\(0\))|0)([1-9]\d)(\d{3})(\d{2})(\d{2})$/", str_replace(' ', '' ,$phone )) && $phone !== '') {
                array_push($errors, 'Bitte geben Sie eine Valide Telefonnummer ein.');
            }
            if ($discount === '' || $discount === null) {
                array_push($errors, 'Bitte geben Sie einen Treuebonus an');
            }
            if (count($errors) < 1) {
                $ticket = new Ticket($lastname, $firstname, $email, $phone, $concert, $discount, 0);
                $ticket->createTicket();
            } else {
                require './app/Views/create.view.php';
            }

        }

    }