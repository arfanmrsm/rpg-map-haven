<?php
 
if (isset($_POST['biodata_validate'])) {
 
  $servername = "lrgs.ftsm.ukm.my";
  $username = "a219588";
  $password = "largegraybear";
  $dbname = "a219588";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare('INSERT INTO biodata(matricnum, name, age, gender, address, email, dob, height, phone, color, fbtwig, photo, university) VALUES(:matricnum, :name, :age, :gender, :address, :email, :dob, :height, :phone, :color, :fbtwig, :photo, :university)');
       
      $stmt->bindParam(':matricnum', $matricnum, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':age', $age, PDO::PARAM_INT);
      $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
      $stmt->bindParam(':address', $address, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':dob', $dob, PDO::PARAM_STR);
      $stmt->bindParam(':height', $height, PDO::PARAM_INT);
      $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
      $stmt->bindParam(':color', $color, PDO::PARAM_STR);
      $stmt->bindParam(':fbtwig', $fbtwig, PDO::PARAM_STR);
      $stmt->bindParam(':photo', $pic, PDO::PARAM_STR);
      $stmt->bindParam(':university', $university, PDO::PARAM_STR);
       
        $matricnum = $_POST['matricnum'];
        $name = $_POST['name'];
        $age = (int) $_POST['age'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $height = (int) $_POST['height'];
        $phone = $_POST['phone'];
        $color = $_POST['color'];
        $fbtwig = $_POST['fbtwig'];
        $pic = $_POST['photo'];
        $university = $_POST['university'];

      $stmt->execute();
     
      echo "New records created successfully";
      }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
 
 ?>