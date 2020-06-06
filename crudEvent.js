$(document).ready(function(){
	$(document).on('click' , '.btn-add' ,function(){
		$("#add-modal").modal('show');	
	});
	$('#frmAdd').bootstrapValidator({
    excluded: [':disabled', ':hidden', ':not(:visible)'],
    message: 'field is not valid',
      feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      offalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      name: {
        validators: {
          notEmpty: {
            message: 'Name required!'
          }
        }
      },
      gender: {
        validators: {
          notEmpty: {
            message: 'Gender required!'
          }
        }
      },
      email: {
          validators: {
              notEmpty: {
                  message: 'The email address is required and can\'t be empty'
              },
              emailAddress: {
                  message: 'The input is not a valid email address'
              }
          }
      },
      phone: {
        validators: {
          notEmpty: {
            message: "Phone number required!"
          },
          regexp: {
            regexp: /^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[6789]\d{9}|(\d[ -]?){10}\d$/,
            message: 'Phone number is not valid!'
          }
        }
      },
      dob: {
          validators: {
              notEmpty: {
                  message: 'The date is required and cannot be empty'
              },
              date: {
                  format: 'DD/MM/YYYY'
              }
          }
      }
    }
  })
	.on('success.form.bv', function(e) {
	  //alert();
	  e.preventDefault();
	  var $form = $(e.target);
	  var bv = $form.data('bootstrapValidator');

	  // Use Ajax to submit form data
	  var files_array_details = new FormData($('#frmAdd')[0]);

	  $.ajax({
	    url: 'add.php',
	    dataType: 'text',
	    cache: false,
	    contentType: false,
	    processData: false,
	    data: files_array_details,
	    type: 'post',
	    async: false,
	    success: function(response){
				$("#messageModal").modal('show');
				$("#msg").html(response);
				$("#add-modal").modal('hide');
				loadData();
	    }
	  });
	});

	$(document).on('click' , '.bn-edit' ,function(){
		var id = this.id;
		$.ajax({
			url: 'read.php',
			type: 'POST',
			dataType: 'JSON',
			data: {"id":id,"type":"single"},
			success:function(response){
				$("#edit-modal").modal('show');
				$('#frmEdit').find('input[name="name"]').val(response.name);
				$('#frmEdit').find('input[name="dob"]').val(response.dob);
				$('#frmEdit').find('input[name="phone"]').val(response.phone);
				$('#frmEdit').find('input[name="email"]').val(response.email);
				//alert(response.gender);
				if(response.gender =='f') {
					$('#frmEdit').find('select[name^="gender"] option[value="f"]').attr("selected","selected");
				}
				else {
					$('#frmEdit').find('select[name^="gender"] option[value="m"]').attr("selected","selected");
				}
				$('#frmEdit').find('input[id="id"]').val(id);
			}
		});
	});
	$('#frmEdit').bootstrapValidator({
    excluded: [':disabled', ':hidden', ':not(:visible)'],
    message: 'field is not valid',
      feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      offalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      name: {
        validators: {
          notEmpty: {
            message: 'Name required!'
          }
        }
      },
      gender: {
        validators: {
          notEmpty: {
            message: 'Gender required!'
          }
        }
      },
      email: {
        validators: {
          notEmpty: {
              message: 'The email address is required and can\'t be empty'
          },
          emailAddress: {
              message: 'The input is not a valid email address'
          }
        }
      },
      phone: {
        validators: {
          notEmpty: {
            message: "Phone number required!"
          },
          regexp: {
            regexp: /^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[6789]\d{9}|(\d[ -]?){10}\d$/,
            message: 'Phone number is not valid!'
          }
        }
      },
      dob: {
        validators: {
          notEmpty: {
            message: 'The date is required and cannot be empty'
          },
          date: {
            format: 'DD/MM/YYYY'
          }
        }
      }
    }
  })
	.on('success.form.bv', function(e) {
	  //alert();
	  e.preventDefault();
	  var $form = $(e.target);
	  var bv = $form.data('bootstrapValidator');

	  // Use Ajax to submit form data
	  var files_array_details = new FormData($('#frmEdit')[0]);

	  $.ajax({
	    url: 'edit.php',
	    dataType: 'text',
	    cache: false,
	    contentType: false,
	    processData: false,
	    data: files_array_details,
	    type: 'post',
	    async: false,
	    success: function(response){
				$("#messageModal").modal('show');
				$("#msg").html(response);
				$("#edit-modal").modal('hide');
				loadData();
	    }
	  });
	});
	
	$(document).on('click' , '.bn-delete' ,function(){
		if(confirm("Are you sure want to delete the record?")) {
			var id = this.id;
			$.ajax({
				url: 'delete.php',
				type: 'POST',
				dataType: 'JSON',
				data: {"id":id},
				success:function(response){
					loadData();
				}
			});
		}
	});
});
	
function loadData() {
	$.ajax({
		url: 'read.php',
		type: 'POST',
		data: {"type":"all"},
		success:function(response){
			$("#container").html(response);
		}
	});
}