<?php
include_once 'CrudController.php';
$crudcontroller = new CrudController();
$result = $crudcontroller->readData();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CRUD</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<script src="crudEvent.js"></script>
		<script src="validator.js"></script>
	</head>
	<body>
	  <div class="row"><button class="btn btn-primary btn-add">Add New Record</button></div>
	  <div class="row" id="container"><?php require_once "list.php" ?></div>

	  <!-- Add Modal -->
		<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		  		<form method="POST" id="frmAdd" enctype="multipart/form-data">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      </div>
		      <div class="modal-body">
				    <div class="form-group">
				      <div class="row">
				        <label>Name</label> <input type="text" name="name" id="name" class="form-control" placeholder="Name">
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="row">
				        <label>Email</label> <input type="text" name="email" id="email" class="form-control" placeholder="Email">
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="row">
				        <label>Phone</label> <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="row">
				        <label>Date of Birth</label> <input type="text" name="dob" id="dob" class="form-control" placeholder="DD/MM/YYYY">
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="row">
				        <label>Gender</label> <select name="gender" id="gender" class="form-control"><option value="m">Male</option><option value="f">Female</option></select>
				      </div>
				    </div>
				  </div>
				  <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary" id="add">Save</button>
		      </div>
					</form>
				</div>
			</div>
		</div>
		<!-- Modal for message-->
	  <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Message</h5>
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        </div>
	        <div class="modal-body"><h4 class="text-center" id="msg"></h4></div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	    </div>
	  </div>
	   <!-- Modal ends here -->


		<!-- Modal -->
		<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <form id="frmEdit" method="POST" enctype="multipart/form-data">
		    	<input type="hidden" name="id" id="id"/>
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
			      <div class="modal-body">
		          <div class="form-group">
		            <div class="row">
		            	<label>Name</label> <input type="text" name="name" id="name" class="form-control">
		            </div>
		          </div>
		          <div class="form-group">
		            <div class="row">
		            	<label>Email</label> <input type="text" name="email" id="email" class="form-control">
		            </div>
		          </div>
		          <div class="form-group">
		            <div class="row">
		            	<label>Phone</label> <input type="text" name="phone" id="phone" class="form-control">
		            </div>
		          </div>
		          <div class="form-group">
		            <div class="row">
		            	<label>Date of Birth</label> <input type="text" name="dob" id="dob" class="form-control">
		            </div>
		          </div>
		          <div class="form-group">
		            <div class="row">
		            	<label>Gander</label> <select name="gender" id="gender" class="form-control"><option value="m">Male</option><option value="f">Female</option></select>
		            </div>
		          </div>
		      	</div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" id="update">Save changes</button>
			      </div>
		    	</div>
		    </form>
		  </div>
		</div>
		<!-- Modal ends here -->
	</body>
</html>