<?php
 
class CustomerModel {
    private $db;
 
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // READ all records
    public function readAll() {
    $sql = "SELECT * FROM tbl_customers_a219588 ORDER BY fld_customer_num ASC";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
    }

    // CREATE a new record
    public function create($data) {
    $sql = "INSERT INTO tbl_customers_a219588
            (fld_customer_num, fld_customer_name, fld_customer_gender,
            fld_customer_phone, fld_customer_register_date)
            VALUES
            (:customer_num, :customer_name, :customer_gender,
            :customer_phone, :customer_register_date)";
 
    $stmt = $this->db->prepare($sql);
 
    $customer_num       = $data['customer_num'];
    $customer_name      = $data['customer_name'];
    $customer_gender    = $data['customer_gender'];
    $customer_phone     = $data['customer_phone'];
    $customer_register_date = $data['customer_register_date'];
 
    $stmt->bindValue(':customer_num',       $customer_num,       PDO::PARAM_STR);
    $stmt->bindValue(':customer_name',      $customer_name,      PDO::PARAM_STR);
    $stmt->bindValue(':customer_gender',    $customer_gender,    PDO::PARAM_STR);
    $stmt->bindValue(':customer_phone',     $customer_phone,     PDO::PARAM_STR);
    $stmt->bindValue(':customer_register_date', $customer_register_date, PDO::PARAM_STR);
 
    $result = $stmt->execute();
 
    return $result;
    }

    // READ a single record by ID
    public function readById($id) {
    $sql = "SELECT * FROM tbl_customers_a219588 WHERE fld_customer_num = :customer_num";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':customer_num', $id, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
    }

    // UPDATE a record
    public function update($data) {
    $sql = "UPDATE tbl_customers_a219588
    SET fld_customer_num = :new_customer_num,
        fld_customer_name = :customer_name,
        fld_customer_gender = :customer_gender,
        fld_customer_phone = :customer_phone,
        fld_customer_register_date = :customer_register_date
    WHERE fld_customer_num = :original_customer_num";
 
    $stmt = $this->db->prepare($sql);
 
    $original_customer_num = $data['original_customer_num'];
    $new_customer_num  = $data['customer_num'];
    $customer_name      = $data['customer_name'];
    $customer_gender    = $data['customer_gender'];
    $customer_phone     = $data['customer_phone'];
    $customer_register_date = $data['customer_register_date'];
 
    $stmt->bindValue(':original_customer_num', $original_customer_num, PDO::PARAM_STR);
    $stmt->bindValue(':new_customer_num',   $new_customer_num,   PDO::PARAM_STR);
    $stmt->bindValue(':customer_name',      $customer_name,      PDO::PARAM_STR);
    $stmt->bindValue(':customer_gender',    $customer_gender,    PDO::PARAM_STR);
    $stmt->bindValue(':customer_phone',     $customer_phone,     PDO::PARAM_STR);
    $stmt->bindValue(':customer_register_date', $customer_register_date, PDO::PARAM_STR);
 
    $result = $stmt->execute();
 
    return $result;
    }

    // DELETE a record
    public function delete($id) {
    $sql = "DELETE FROM tbl_customers_a219588 WHERE fld_customer_num = :customer_num";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':customer_num', $id, PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;
    }


}
 
?>