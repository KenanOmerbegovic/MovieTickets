<?php
class MovieDAO {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM Movies");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->db->prepare("SELECT * FROM Movies WHERE Id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($movie) {
        $stmt = $this->db->prepare("INSERT INTO Movies (Title, Genre, Director, ReleaseDate, Duration, Rating, Description)
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $movie['Title'], $movie['Genre'], $movie['Director'],
            $movie['ReleaseDate'], $movie['Duration'], $movie['Rating'], $movie['Description']
        ]);
        return $this->db->lastInsertId();
    }

    public function update($id, $movie) {
        $stmt = $this->db->prepare("UPDATE Movies SET Title = ?, Genre = ?, Director = ?, ReleaseDate = ?, Duration = ?, Rating = ?, Description = ? WHERE Id = ?");
        return $stmt->execute([
            $movie['Title'], $movie['Genre'], $movie['Director'],
            $movie['ReleaseDate'], $movie['Duration'], $movie['Rating'], $movie['Description'], $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Movies WHERE Id = ?");
        return $stmt->execute([$id]);
    }
}
