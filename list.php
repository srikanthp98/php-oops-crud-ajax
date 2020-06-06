<?php
if (! empty($result)) {
  foreach ($result as $k => $v) {
?>
<div class="box-container">
  <div class="title">
    <a href="<?php echo $result[$k]["uid"]; ?>">U<?php echo $result[$k]["uid"]; ?></a>
  </div>
  <div class="name"><?php echo $result[$k]["name"]; ?></div>
  <div class="email"><?php echo $result[$k]["email"]; ?></div>
  <div class="phone"><?php echo $result[$k]["phone"]; ?></div>
  <div class="dob"><?php echo date('d-m-Y', strtotime($result[$k]["dob"])); ?></div>
  <div class="gender"><?php echo $result[$k]["gender"]=='m'? 'Male': ($result[$k]["gender"]=='f'? 'Female': '--'); ?></div>
  <div class="created_date"><?php echo date('d-m-Y', strtotime($result[$k]["created_date"])); ?></div>
  <div class="modified_date"><?php echo $result[$k]["modified_date"]? date('d-m-Y', strtotime($result[$k]["modified_date"])):'--'; ?></div>
  <div class="">
    <button class="btn btn-primary btn-action bn-edit" id="<?php echo $result[$k]["uid"]; ?>">Edit</button>
    <button class="btn btn-primary btn-action bn-delete" id="<?php echo $result[$k]["uid"]; ?>">Delete</button>
  </div>
</div>
<?php
  }
}
else { ?>
  <div><div class="alert alert-warning">No Records Found!</div></div>
<?php }
?>