<?php
include_once 'Database.php';

class CrudController
{

  /* Fetch All */
  public function readData()
  {
    try {  
      $dao = new Database();
      $conn = $dao->openConnection();
      $sql = "SELECT uid, name, email, phone, dob, gender, created_date, modified_date FROM `mUsers` ORDER BY created_date DESC, name ASC";
      $resource = $conn->query($sql);
      $result = $resource->fetchAll(PDO::FETCH_ASSOC);
      $dao->closeConnection();
    } catch (PDOException $e) {  
      echo "There is some problem in connection: " . $e->getMessage();
    }

    if (! empty($result)) {
      return $result;
    }
  }

  /* Fetch Single Record by Id */
  public function readSingle($id)
  {
    try {  
      $dao = new Database();
      $conn = $dao->openConnection();
      $sql = "SELECT uid, name, email, phone, dob, gender, created_date, modified_date FROM `mUsers` WHERE uid=" . $id . " ORDER BY uid DESC";
      $resource = $conn->query($sql);
      $result = $resource->fetchAll(PDO::FETCH_ASSOC);
      $dao->closeConnection();
    } catch (PDOException $e) { 
      echo "There is some problem in connection: " . $e->getMessage();
    }
    if (! empty($result)) {
      return $result;
    }
  }

  /* Add New Record */
  public function add($formArray)
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = date('Y-m-d h:i:s', strtotime($_POST['dob']));
    $gender = $_POST['gender'];

    $dao = new Database();
    $conn = $dao->openConnection();
      
    $sql = "INSERT INTO `mUsers`(`name`, `email`, `phone`, `dob`, `gender`) VALUES ('" . $name . "','" . $email . "','" . $phone . "','" . $dob . "','".$gender."')";
    //print $sql;exit;
    $conn->query($sql);
    $dao->closeConnection();
  }

  /* Edit a Record */
  public function edit($formArray)
  {
    //print_r($_POST);
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = date('Y-m-d h:i:s', strtotime($_POST['dob']));
    $gender = $_POST['gender'];
    $modified_date = date('Y-m-d H:i:s');
    
    $dao = new Database();
    
    $conn = $dao->openConnection();
    
    $sql = "UPDATE mUsers SET name = '" . $name . "' , email='" . $email . "', phone='" . $phone . "', dob='" . $dob . "', gender='".$gender."', modified_date='".$modified_date."' WHERE uid=" . $id;
    //print $sql;
    
    $conn->query($sql);
    $dao->closeConnection();
  }

  /* Delete a Record */
  public function delete($id)
  {
    $dao = new Database();
    $conn = $dao->openConnection();
    $sql = "DELETE FROM `mUsers` where uid='$id'";
    $conn->query($sql);
    $dao->closeConnection();
  }
}

?>