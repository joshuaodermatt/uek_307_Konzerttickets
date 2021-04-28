<?php
class Ticket {
    public string $lastname;
    public string $firstname;
    public string $email;
    public string $phone;
    public int $concert;
    public int $discount;
    public bool $status;

    public function construct($lastname, $firstname, $email, $phone, $concert, $discount, $status) {
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
}
