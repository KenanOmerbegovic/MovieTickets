<?php
class PaymentDAO {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM Payments")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->db->prepare("SELECT * FROM Payments WHERE Id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($payment) {
        $stmt = $this->db->prepare("INSERT INTO Payments (Amount, PaymentDate, PaymentMethod, TicketId)
            VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $payment['Amount'], $payment['PaymentDate'],
            $payment['PaymentMethod'], $payment['TicketId']
        ]);
        return $this->db->lastInsertId();
    }

    public function update($id, $payment) {
        $stmt = $this->db->prepare("UPDATE Payments SET Amount = ?, PaymentDate = ?, PaymentMethod = ?, TicketId = ? WHERE Id = ?");
        return $stmt->execute([
            $payment['Amount'], $payment['PaymentDate'],
            $payment['PaymentMethod'], $payment['TicketId'], $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Payments WHERE Id = ?");
        return $stmt->execute([$id]);
    }
}
