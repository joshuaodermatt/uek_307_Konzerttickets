<?php
class EditController {



    function edit() {


        $id = $_GET['id'];

        if (isset($id)) {

            $ticket = (new Ticket)->getById($id);

            $response = $this->fetchAllConcerts();

            $selectedConcert = null;

            $restOfConcerts = [];

            foreach ($response as $concert) {
                if($ticket->concert == $concert['id']) {
                    $selectedConcert = $concert;
                } else {
                    array_push($restOfConcerts, $concert);
                }

            }

            require 'app/Views/edit.view.php';
        }else {
            header('Location: /pending');
        }
    }


    function update() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $lastname = $_POST['lastname']?? '';
            $firstname = $_POST['firstname']?? '';
            $email = $_POST['email']?? '';
            $phone = $_POST['phone']?? '';
            $concert = $_POST['concert']?? '';
            $discount = $_POST['discount'];
            $status = 0;

            $errors = [];

            $lastname = trim($lastname);
            $firstname = trim($firstname);
            $email = trim($email);
            $phone = trim($phone);

            if($email == ''){
                array_push($errors, 'Bitte tragen Sie eine Email ein.');
            } elseif (!preg_match("/[^@]+@[^.]+\..+$/i", $email)) {
                array_push($errors, 'Bitte tragen Sie eine Valide Email ein.');
            }

            if ($phone != '' && !preg_match("/^(?:(?:|0{1,2}|\+{0,2})41(?:|\(0\))|0)([1-9]\d)(\d{3})(\d{2})(\d{2})$/", str_replace(' ', '' ,$phone ))) {
                array_push($errors, 'Bitte tragen Sie eine Valide Telefonnummer ein.');
            }

            if($lastname == '') {
                array_push($errors, 'Bitte tragen Sie einen Nachnamen ein.');
            }

            if($firstname == '') {
                array_push($errors, 'Bitte tragen Sie einen Vornamen ein.');
            }


            if(isset($_POST['status'])) {
                $status= $_POST['status'];
            }

            if (!$errors > 0) {
                $ticket = new Ticket(
                    $id,
                    $lastname,
                    $firstname,
                    $email,
                    $phone,
                    $concert,
                    $discount,
                    $status
                );

                $ticket->update();
                header('Location: /pending');
            } else {

                $ticket = new Ticket(
                    $id,
                    $lastname,
                    $firstname,
                    $email,
                    $phone,
                    $concert,
                    $discount,
                    $status
                );

                $allConcerts = $this->fetchAllConcerts();

                $selectedConcert = null;

                $restOfConcerts = [];

                foreach ($allConcerts as $concert) {
                    if($ticket->concert == $concert['id']) {
                        $selectedConcert = $concert;
                    } else {
                        array_push($restOfConcerts, $concert);
                    }

                }

                require 'app/Views/edit.view.php';


            }
        }else {
            header('Location: /');
        }



    }


    function fetchAllConcerts(): array{
        $pdo = db();
        $statement = $pdo->prepare('SELECT * FROM concerts');
        $statement->execute();
        $responce = $statement->fetchAll();
        return $responce;
    }

}