<?php
class CustomerDAO {
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM Customers")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->db->prepare("SELECT * FROM Customers WHERE Id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($customer) {
        $stmt = $this->db->prepare("INSERT INTO Customers (FirstName, LastName, Email, PhoneNumber, DateOfBirth)
            VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $customer['FirstName'], $customer['LastName'],
            $customer['Email'], $customer['PhoneNumber'], $customer['DateOfBirth']
        ]);
        return $this->db->lastInsertId();
    }

    public function update($id, $customer) {
        $stmt = $this->db->prepare("UPDATE Customers SET FirstName = ?, LastName = ?, Email = ?, PhoneNumber = ?, DateOfBirth = ? WHERE Id = ?");
        return $stmt->execute([
            $customer['FirstName'], $customer['LastName'],
            $customer['Email'], $customer['PhoneNumber'], $customer['DateOfBirth'], $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM Customers WHERE Id = ?");
        return $stmt->execute([$id]);
    }
}
