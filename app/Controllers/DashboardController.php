<?php
    class DashboardController {
        public function show() {
            $pendingCount = $this->getAmountOfPendingTickets();
            $expiredTickets = $this->getAmountOfExpiredTickets();
            $ticketsOfToday = $this->getTicketsForTodaySection();
            $concerts = $this->fetchAllConcerts();
            require './app/Views/dashboard.view.php';
        }

        function getTicketsForTodaySection() : array{
            $pdo = db();
            $statement = $pdo->prepare('Select * FROM `tickets`');
            $statement->execute();
            $tickets = $statement->fetchAll();
            $ticketsOfToday = $this->getTicketsOfToday($tickets);
            return $ticketsOfToday;
        }

        function fetchAllConcerts(): array{
            $pdo = db();
            $statement = $pdo->prepare('SELECT * FROM concerts');
            $statement->execute();
            $response = $statement->fetchAll();
            return $response;
        }

        function getTicketsOfToday($tickets) :array {
            $ticketsOfToday = [];
            foreach ($tickets as $ticket) {
                $dateTimeStamp = strtotime($ticket['created']);
                $dateTimeStamp = date("Y-m-d", $dateTimeStamp);
                $dateNow = date("Y-m-d");
                if ($dateNow == $dateTimeStamp) {
                    array_push($ticketsOfToday, $ticket);
                }
            }
            return $ticketsOfToday;
        }

        function getAmountOfPendingTickets() : int{
            $pdo = db();
            $statement = $pdo->prepare('Select * FROM `tickets` WHERE status = 0');
            $statement->execute();
            $tickets = $statement->fetchAll();
            return count($tickets);
        }

        function getAmountOfExpiredTickets() : int {
            $pdo = db();
            $statement = $pdo->prepare('Select * FROM `tickets` WHERE status = 0');
            $statement->execute();
            $tickets = $statement->fetchAll();
            $count = 0;
            foreach ($tickets as $ticket) {
                $dateTimeStamp = strtotime($ticket['due']);
                $dateToday = date("Y-m-d H:i:s");
                $dateToday = strtotime($dateToday);
                if ($dateToday > $dateTimeStamp) {
                    $count ++;
                }
            }
            return $count;
        }
    }