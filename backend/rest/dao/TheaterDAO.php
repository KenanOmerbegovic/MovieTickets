<?php
class TheaterDAO {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM Theaters")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->db->prepare("SELECT * FROM Theaters WHERE Id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($theater) {
        $stmt = $this->db->prepare("INSERT INTO Theaters (Name, Capacity, Location)
            VALUES (?, ?, ?)");
        $stmt->execute([$theater['Name'], $theater['Capacity'], $theater['Location']]);
        return $this->db->lastInsertId();
    }

    public function update($id, $theater) {
        $stmt = $this->db->prepare("UPDATE Theaters SET Name = ?, Capacity = ?, Location = ? WHERE Id = ?");
        return $stmt->execute([$theater['Name'], $theater['Capacity'], $theater['Location'], $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Theaters WHERE Id = ?");
        return $stmt->execute([$id]);
    }
}
