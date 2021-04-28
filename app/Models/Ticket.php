<?php
class Ticket {
    public int $id;
    public string $lastname;
    public string $firstname;
    public string $email;
    public string $phone;
    public int $concert;
    public int $discount;
    public bool $status;

    public function __construct($id = 0, $lastname = '', $firstname = '', $email = '', $phone = '', $concert = 0, $discount = 0, $status = 0) {
        $this->id = $id;
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

        $ticket = new Ticket(
            $response[0]['id'],
            $response[0]['lastname'],
            $response[0]['firstname'],
            $response[0]['email'],
            $response[0]['phone'],
            $response[0]['concert'],
            $response[0]['discount'],
            $response[0]['status']
        );

        return $ticket;

    }

    public function update(){
        $pdo = db();



        $statement = $pdo->prepare('UPDATE `tickets` SET lastname = :lastname, firstname = :firstname, email = :email, phone = :phone, concert = :concert, status = :status WHERE id = :id');

        $status = $this->mapBoolToInt($this->status);

        $statement->bindParam(':firstname', $this->firstname);
        $statement->bindParam(':lastname', $this->lastname);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phone', $this->phone);
        $statement->bindParam(':concert', $this->concert);
        $statement->bindParam(':status', $status);
        $statement->bindParam(':id', $this->id);


        $statement->execute();
    }

    protected function mapBoolToInt($boolean):int {
        if($boolean) {
            return 1;
        }
        return 0;
    }
}
