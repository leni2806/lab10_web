<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "latihan1"; 

    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function escape($value) {
        return $this->conn->real_escape_string($value);
    }

    // ---------------------------
    // INSERT
    // ---------------------------
    public function insert($table, $data) {
        $columns = implode(",", array_keys($data));
        $values  = array_map([$this->conn, 'real_escape_string'], array_values($data));
        $values  = "'" . implode("','", $values) . "'";

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->conn->query($sql);
    }

    // ---------------------------
    // SELECT
    // ---------------------------
    public function get($table, $where = "") {
        $sql = "SELECT * FROM $table";
        if ($where != "") {
            $sql .= " WHERE $where";
        }
        $result = $this->conn->query($sql);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    // ---------------------------
    // UPDATE
    // ---------------------------
    public function update($table, $data, $where) {
        $set = [];
        foreach ($data as $col => $value) {
            $escaped = $this->conn->real_escape_string($value);
            $set[] = "$col='$escaped'";
        }

        $set_string = implode(",", $set);
        $sql = "UPDATE $table SET $set_string WHERE $where";
        return $this->conn->query($sql);
    }

    // ---------------------------
    // DELETE
    // ---------------------------
    public function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE $where";
        return $this->conn->query($sql);
    }
}
?>
