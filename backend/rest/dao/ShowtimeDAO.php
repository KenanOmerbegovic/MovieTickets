<?php
class ShowtimeDAO {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM Showtimes")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->db->prepare("SELECT * FROM Showtimes WHERE Id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($showtime) {
        $stmt = $this->db->prepare("INSERT INTO Showtimes (ShowDateTime, TheaterId)
            VALUES (?, ?)");
        $stmt->execute([$showtime['ShowDateTime'], $showtime['TheaterId']]);
        return $this->db->lastInsertId();
    }

    public function update($id, $showtime) {
        $stmt = $this->db->prepare("UPDATE Showtimes SET ShowDateTime = ?, TheaterId = ? WHERE Id = ?");
        return $stmt->execute([$showtime['ShowDateTime'], $showtime['TheaterId'], $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Showtimes WHERE Id = ?");
        return $stmt->execute([$id]);
    }
}
