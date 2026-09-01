<?php
// models/Medicine.php
// All queries use prepared statements (bind_param) - no string concatenation.

class Medicine {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $sql = "SELECT * FROM medicines ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function search($keyword) {
        $like = "%" . $keyword . "%";
        $sql = "SELECT * FROM medicines
                WHERE name LIKE ? OR category LIKE ? OR supplier LIKE ?
                ORDER BY name ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $like, $like, $like);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function getById($id) {
        $id = (int) $id;
        $sql = "SELECT * FROM medicines WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function add($data) {
        $name     = $data['name'] ?? '';
        $category = $data['category'] ?? '';
        $price    = $data['price'] ?? 0;
        $quantity = $data['quantity'] ?? 0;
        $expiry   = $data['expiry_date'] ?? null;
        $supplier = $data['supplier'] ?? '';

        $sql = "INSERT INTO medicines (name, category, price, quantity, expiry_date, supplier)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdiss", $name, $category, $price, $quantity, $expiry, $supplier);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $id       = (int) $id;
        $name     = $data['name'] ?? '';
        $category = $data['category'] ?? '';
        $price    = $data['price'] ?? 0;
        $quantity = $data['quantity'] ?? 0;
        $expiry   = $data['expiry_date'] ?? null;
        $supplier = $data['supplier'] ?? '';

        $sql = "UPDATE medicines SET
                    name = ?, category = ?, price = ?,
                    quantity = ?, expiry_date = ?, supplier = ?
                WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdissi", $name, $category, $price, $quantity, $expiry, $supplier, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $id = (int) $id;
        $sql = "DELETE FROM medicines WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function getLowStock($threshold = 20) {
        $threshold = (int) $threshold;
        $sql = "SELECT * FROM medicines WHERE quantity < ? ORDER BY quantity ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $threshold);
        $stmt->execute();
        return $stmt->get_result();
    }
}