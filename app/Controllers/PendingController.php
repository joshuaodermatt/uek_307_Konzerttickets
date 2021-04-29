<?php
class PendingController {
    function list() {

        $ticketsExpired = $this->fetchExpiredTickets();

        $ticketsNotExpired = $this->fetchNonExpiredTickets();

        require 'app/Views/pending.view.php';
    }

    function fetchExpiredTickets() {
        $pdo = db();

        $statement = $pdo->prepare('SELECT * FROM `tickets` WHERE status = 0 AND due < NOW() ORDER BY created DESC');

        $statement->execute();

        return $statement->fetchAll();
    }

    function fetchNonExpiredTickets() {
        $pdo = db();

        $statement = $pdo->prepare('SELECT * FROM `tickets` WHERE status = 0 AND due > NOW()');

        $statement->execute();

        return $statement->fetchAll();
    }
}