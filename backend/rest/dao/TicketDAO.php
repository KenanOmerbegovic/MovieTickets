<?php
class TicketDAO {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM Tickets")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->db->prepare("SELECT * FROM Tickets WHERE Id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($ticket) {
        $stmt = $this->db->prepare("INSERT INTO Tickets (SeatNumber, Price, PurchaseDate, CustomerId, ShowtimeId)
            VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $ticket['SeatNumber'], $ticket['Price'],
            $ticket['PurchaseDate'], $ticket['CustomerId'], $ticket['ShowtimeId']
        ]);
        return $this->db->lastInsertId();
    }

    public function update($id, $ticket) {
        $stmt = $this->db->prepare("UPDATE Tickets SET SeatNumber = ?, Price = ?, PurchaseDate = ?, CustomerId = ?, ShowtimeId = ? WHERE Id = ?");
        return $stmt->execute([
            $ticket['SeatNumber'], $ticket['Price'],
            $ticket['PurchaseDate'], $ticket['CustomerId'], $ticket['ShowtimeId'], $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Tickets WHERE Id = ?");
        return $stmt->execute([$id]);
    }
}
