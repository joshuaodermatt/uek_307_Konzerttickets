<?php
class EditController {
    function edit() {
        $pdo = db();

        $id = $_GET['id'];

        if (isset($id)) {

            $ticket = (new Ticket)->getById($id);


            require 'app/Views/edit.view.php';
        }else {
            header('Location: /');
        }
    }
}