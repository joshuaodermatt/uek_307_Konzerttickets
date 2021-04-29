<?php
class Concert {
    public int $id;
    public string $artist;

    public function __construct($id = 0, $artist = '') {

    }

    public function getById($id) {
        $pdo = db();
        $statement = $pdo->prepare('SELECT * FROM concerts WHERE id = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
        $response = $statement->fetchAll();
        return new self($id, $response[0]['artist']);
    }
}