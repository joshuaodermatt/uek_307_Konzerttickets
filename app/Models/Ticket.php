<?php
class Ticket {
    public string $lastname;
    public string $firstname;
    public string $email;
    public string $phone;
    public int $concert;
    public int $discount;
    public bool $status;

    public function __construct($lastname = null, $firstname = null, $email = null, $phone = null, $concert = null, $discount = null, $status = null) {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->phone = $phone;
        $this->concert = $concert;
        $this->discount = $discount;
        $this->status = $status;
    }


    public function getById($id): Ticket {

        $pdo = db();

        $statement = $pdo->prepare('SELECT * FROM tickets WHERE id = :id');

        $statement->bindParam(':id', $id);

        $statement->execute();

        $response = $statement->fetchAll();



        $ticket = new self();
        $ticket->construct(
            $response[0]['lastname'],
            $response[0]['firstname'],
            $response[0]['e-mail'],
            $response[0]['phone'],
            $response[0]['concert'],
            $response[0]['discount'],
            $response[0]['status']
        );
        return $ticket;

    }

    protected function fetchConcert($id) {
        $pdo = db();

        $statement = $pdo->prepare('SELECT * FROM tickets WHERE id = :id');

        $statement->bindParam(':id', $id);

        $statement->execute();

        $response = $statement->fetchAll();
    }

    public function createTicket() {

        $this->lastname = htmlspecialchars($this->lastname);
        $this->firstname = htmlspecialchars($this->firstname);
        $this->email = htmlspecialchars($this->email);
        $this->phone = htmlspecialchars($this->phone);
        $this->concert = htmlspecialchars($this->concert);
        $this->discount = htmlspecialchars($this->discount);
        $pdo = db();
        $due = $this->getDue();
        $created = date("Y-m-d H:i:s");
        $status = $this->getStatus();
        $statement = $pdo->prepare('INSERT INTO `tickets`(lastname,firstname,email,phone,concert,discount,status,created,due) VALUES(:lastname,:firstname, :email, :phone, :concert, :discount, :status, :created, :due)');
        $statement->bindParam(':lastname', $this->lastname);
        $statement->bindParam(':firstname', $this->firstname);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phone', $this->phone);
        $statement->bindParam(':concert', $this->concert);
        $statement->bindParam(':discount', $this->discount);
        $statement->bindParam(':status', $status);
        $statement->bindParam(':created', $created);
        $statement->bindParam(':due', $due);

        $statement->execute();
    }

    public function getDue() {
        if ($this->discount === 5) {
            return date("Y-m-d H:i:s", strtotime('+20 day'));
        } else if ($this->discount === 10) {
            return date("Y-m-d H:i:s", strtotime('+15 day'));
        } else if ($this->discount === 15) {
            return date("Y-m-d H:i:s", strtotime('+10 day'));
        } else {
            return date("Y-m-d H:i:s", strtotime('+30 day'));
        }
    }

    private function getStatus() {
        if ($this->status === false) {
            return 0;
        } else {
            return 1;
        }
    }


}