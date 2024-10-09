<?php
// Gudang.php
require_once 'db.php';

class Gudang {
    private $conn;

    public function __construct(PDO $connection) {
        $this->conn = $connection;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM gudang WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $location, $capacity, $status, $opening_hour, $closing_hour) {
        $stmt = $this->conn->prepare("INSERT INTO gudang (name, location, capacity, status, opening_hour, closing_hour) VALUES (:name, :location, :capacity, :status, :opening_hour, :closing_hour)");
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":location", $location, PDO::PARAM_STR);
        $stmt->bindParam(":capacity", $capacity, PDO::PARAM_INT);
        $stmt->bindParam(":status", $status, PDO::PARAM_STR);
        $stmt->bindParam(":opening_hour", $opening_hour, PDO::PARAM_STR);
        $stmt->bindParam(":closing_hour", $closing_hour, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function read() {
        $stmt = $this->conn->query("SELECT * FROM gudang");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $location, $capacity, $status, $opening_hour, $closing_hour) {
        $stmt = $this->conn->prepare("UPDATE gudang SET name = :name, location = :location, capacity = :capacity, status = :status, opening_hour = :opening_hour, closing_hour = :closing_hour WHERE id = :id");
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":location", $location, PDO::PARAM_STR);
        $stmt->bindParam(":capacity", $capacity, PDO::PARAM_INT);
        $stmt->bindParam(":status", $status, PDO::PARAM_STR);
        $stmt->bindParam(":opening_hour", $opening_hour, PDO::PARAM_STR);
        $stmt->bindParam(":closing_hour", $closing_hour, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM gudang WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>