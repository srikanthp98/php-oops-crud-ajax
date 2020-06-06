<?php
include_once 'CrudController.php';
$crudcontroller = new CrudController();
$result = $crudcontroller->add($_POST);
print_r(json_encode("Record added successfully"));
?>