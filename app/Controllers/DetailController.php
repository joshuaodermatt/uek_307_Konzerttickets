<?php
class DetailController {
    function show() {
        $id = $_GET['id'];

        $pdo = db();
        $ticket = new Ticket();
        $ticket = $ticket->getById($id);
        $concert = $this->fetchConcertById($ticket->id)['artist'];

        require 'app/Views/detail.view.php';
    }
    function fetchConcertById($id): array{
        $pdo = db();
        $statement = $pdo->prepare('SELECT * FROM concerts WHERE id = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $response = $statement->fetchAll();
        return $response[0];
    }
}
