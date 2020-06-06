<?php
  include_once 'CrudController.php';
  $crudcontroller = new CrudController();
  switch($_POST["type"]) {  
    case "single":      
      if(isset($_POST["id"])) {
        $result = $crudcontroller->readSingle($_POST["id"]);
        if(!empty($result)) {
          $responseArray["id"] = $result[0]["uid"];
          $responseArray["email"] = $result[0]["email"];
          $responseArray["name"] = $result[0]["name"];
          $responseArray["phone"] = $result[0]["phone"];
          $responseArray["dob"] = date('d/m/Y', strtotime($result[0]["dob"]));
          $responseArray["gender"] = $result[0]["gender"];
          echo json_encode($responseArray);
        }
      }
      break;
    case "all":
      $result = $crudcontroller->readData();
      require_once "list.php";
      break;      
    default:
      break;
  }
?>