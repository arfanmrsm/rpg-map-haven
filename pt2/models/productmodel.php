<?php
 
class ProductModel {
    private $db;
 
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // READ all records
    public function readAll() {
    $sql = "SELECT * FROM tbl_products_a219588 ORDER BY fld_product_num ASC";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
    }

    // CREATE a new record
    public function create($data) {
    $sql = "INSERT INTO tbl_products_a219588
            (fld_product_num, fld_product_name, fld_product_price,
            fld_product_brand, fld_product_size, fld_product_theme,
            fld_product_quantity, fld_product_image)
            VALUES
            (:product_num, :product_name, :product_price,
            :product_brand, :product_size, :product_theme,
            :product_quantity, :product_image)";
 
    $stmt = $this->db->prepare($sql);
 
    $product_num       = $data['product_num'];
    $product_name      = $data['product_name'];
    $product_price     = $data['product_price'];
    $product_brand     = $data['product_brand'];
    $product_size      = $data['product_size'];
    $product_theme     = $data['product_theme'];
    $product_quantity  = $data['product_quantity'];
    $product_image     = $data['product_image'] ?? '';
 
    $stmt->bindValue(':product_num',       $product_num,       PDO::PARAM_STR);
    $stmt->bindValue(':product_name',      $product_name,      PDO::PARAM_STR);
    $stmt->bindValue(':product_price',     $product_price);
    $stmt->bindValue(':product_brand',     $product_brand,     PDO::PARAM_STR);
    $stmt->bindValue(':product_size',      $product_size,      PDO::PARAM_STR);
    $stmt->bindValue(':product_theme',     $product_theme,     PDO::PARAM_STR);
    $stmt->bindValue(':product_quantity',  $product_quantity,  PDO::PARAM_INT);
    $stmt->bindValue(':product_image',     $product_image,     PDO::PARAM_STR);
 
    $result = $stmt->execute();
 
    return $result;
    }

    // READ a single record by ID
    public function readById($id) {
    $sql = "SELECT * FROM tbl_products_a219588 WHERE fld_product_num = :product_num";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':product_num', $id, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
    }

    // UPDATE a record
    public function update($data) {
    $sql = "UPDATE tbl_products_a219588
    SET fld_product_num = :new_product_num,
        fld_product_name = :product_name,
        fld_product_price = :product_price,
        fld_product_brand = :product_brand,
        fld_product_size = :product_size,
        fld_product_theme = :product_theme,
        fld_product_quantity = :product_quantity,
        fld_product_image = :product_image
    WHERE fld_product_num = :original_product_num";
 
    $stmt = $this->db->prepare($sql);
 
    $original_product_num = $data['original_product_num'];
    $new_product_num  = $data['product_num'];
    $product_name      = $data['product_name'];
    $product_price     = $data['product_price'];
    $product_brand     = $data['product_brand'];
    $product_size      = $data['product_size'];
    $product_theme     = $data['product_theme'];
    $product_quantity  = $data['product_quantity'];
    $product_image     = $data['product_image'] ?? '';
 
    $stmt->bindValue(':original_product_num', $original_product_num, PDO::PARAM_STR);
    $stmt->bindValue(':new_product_num',   $new_product_num,   PDO::PARAM_STR);
    $stmt->bindValue(':product_name',      $product_name,      PDO::PARAM_STR);
    $stmt->bindValue(':product_price',     $product_price);
    $stmt->bindValue(':product_brand',     $product_brand,     PDO::PARAM_STR);
    $stmt->bindValue(':product_size',      $product_size,      PDO::PARAM_STR);
    $stmt->bindValue(':product_theme',     $product_theme,     PDO::PARAM_STR);
    $stmt->bindValue(':product_quantity',  $product_quantity,  PDO::PARAM_INT);
    $stmt->bindValue(':product_image',     $product_image,     PDO::PARAM_STR);
 
    $result = $stmt->execute();
 
    return $result;
    }

    // DELETE a record
    public function delete($id) {
    $sql = "DELETE FROM tbl_products_a219588 WHERE fld_product_num = :product_num";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':product_num', $id, PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;
    }


}
 
?>