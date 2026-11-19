<?php
 
class StaffModel {
    private $db;
 
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // READ all records
    public function readAll() {
    $sql = "SELECT * FROM tbl_staffs_a219588 ORDER BY fld_staff_num ASC";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
    }

    // CREATE a new record
    public function create($data) {
    $sql = "INSERT INTO tbl_staffs_a219588
            (fld_staff_num, fld_staff_name,
            fld_staff_phone, fld_staff_email)
            VALUES
            (:staff_num, :staff_name,
            :staff_phone, :staff_email)";
 
    $stmt = $this->db->prepare($sql);
 
    $staff_num       = $data['staff_num'];
    $staff_name      = $data['staff_name'];
    $staff_phone     = $data['staff_phone'];
    $staff_email     = $data['staff_email'];
 
    $stmt->bindValue(':staff_num',       $staff_num,       PDO::PARAM_STR);
    $stmt->bindValue(':staff_name',      $staff_name,      PDO::PARAM_STR);
    $stmt->bindValue(':staff_phone',     $staff_phone,     PDO::PARAM_STR);
    $stmt->bindValue(':staff_email',     $staff_email,     PDO::PARAM_STR);
 
    $result = $stmt->execute();
 
    return $result;
    }

    // READ a single record by ID
    public function readById($id) {
    $sql = "SELECT * FROM tbl_staffs_a219588 WHERE fld_staff_num = :staff_num";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':staff_num', $id, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
    }

    // UPDATE a record
    public function update($data) {
    $sql = "UPDATE tbl_staffs_a219588
    SET fld_staff_num = :staff_num,
        fld_staff_name = :staff_name,
        fld_staff_phone = :staff_phone,
        fld_staff_email = :staff_email
    WHERE fld_staff_num = :original_staff_num";
 
    $stmt = $this->db->prepare($sql);
 
    $original_staff_num = $data['original_staff_num'];
    $staff_num  = $data['staff_num'];
    $staff_name      = $data['staff_name'];
    $staff_phone     = $data['staff_phone'];
    $staff_email     = $data['staff_email'];
 
    $stmt->bindValue(':original_staff_num', $original_staff_num, PDO::PARAM_STR);
    $stmt->bindValue(':staff_num',      $staff_num,   PDO::PARAM_STR);
    $stmt->bindValue(':staff_name',      $staff_name,      PDO::PARAM_STR);
    $stmt->bindValue(':staff_phone',     $staff_phone,     PDO::PARAM_STR);
    $stmt->bindValue(':staff_email',     $staff_email,     PDO::PARAM_STR);
 
    $result = $stmt->execute();
 
    return $result;
    }

    // DELETE a record
    public function delete($id) {
    $sql = "DELETE FROM tbl_staffs_a219588 WHERE fld_staff_num = :staff_num";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':staff_num', $id, PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;
    }


}
 
?>