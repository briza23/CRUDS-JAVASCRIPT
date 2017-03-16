<!DOCTYPE html>
<html>
<head>
	<title>CRUDS</title>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		body{
			background-color: #e7e7e7;
			padding: 30px;
		}
		.fa-plus{
			padding: 3px;
		}
		.member-h1{
			text-align: center;
			color: black;
		}
		.search {
		    width: 130px;
		    box-sizing: border-box;
		    border: 2px solid #ccc;
		    border-radius: 4px;
		    font-size: 16px;
		    background-color: white;
		    background-image: url('https://www.w3schools.com/howto/searchicon.png');
		    background-position: 10px 10px; 
		    background-repeat: no-repeat;
		    padding: 12px 20px 12px 40px;
		    -webkit-transition: width 0.4s ease-in-out;
		    transition: width 0.4s ease-in-out;
		}

		.search:focus {
		    width: 30%;
		}
	</style>
</head>
<body>
<h1 class="member-h1">Members</h1>
<input type="text" class="pull-right search" name="search" placeholder="Search..">
<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addmodal">Add<i class="fa fa-plus" aria-hidden="true"></i></button>
<div class="col-md-12">
	<table class="table">
	    <thead>
	      <tr>
	        <th>Firstname</th>
	        <th>Lastname</th>
	        <th>Email</th>
	        <th>Position</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php foreach($members as $value){?>
			<tr>
				<td class="first_name"><?php echo $value->first_name?></td>
				<td class="last_name"><?php echo $value->last_name?></td>
				<td class="email"><?php echo $value->email?></td>
				<td class="position"><?php echo $value->position?></td>
				<td><button type="button" class="btn btn-warning appendupdate" data-toggle="modal" data-target="#updatemodal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
				<td><button type="button" value="<?php echo $value->id?>" class="btn btn-danger id"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
				<td class="hidden id_mem"><?php echo $value->id?></td>
			</tr>
			<?php }?>
	    </tbody>
	</table>
	 <!-- Modal Add -->
	  <div class="modal fade" id="addmodal" role="dialog">
	    <div class="modal-dialog"> 
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Add A Member</h4>
	        </div>
   			<div class="modal-body">
   				<div class="row">
		   			<div class="col-md-6">
		   				<label for="fname">First Name</label>
				        <input type="text" class="form-control" id="fname">
		   			</div>
		   			<div class="col-md-6">
		   				<label for="lname">Last Name</label>
				        <input type="text" class="form-control" id="lname">
		   			</div>
   					<div class="col-md-6">
		   				<label for="Email">Email</label>
				        <input type="text" class="form-control" id="email">
		   			</div>
   					<div class="col-md-6">
		   				<label for="position">Position</label>
				        <input type="text" class="form-control" id="position">
		   			</div>
	   			</div>
			</div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-success" id="addmember">Add</button>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
	  <!-- Modal Update -->
	  <div class="modal fade" id="updatemodal" role="dialog">
	    <div class="modal-dialog"> 
	    
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Update A Member</h4>
	        </div>
   			<div class="modal-body">
   				<div class="row">
		   			<div class="col-md-6">
		   				<label for="fname">First Name</label>
				        <input type="text" class="form-control" id="fname_update">
				        <input type="hidden" class="form-control" id="id_update">
		   			</div>
		   			<div class="col-md-6">
		   				<label for="lname">Last Name</label>
				        <input type="text" class="form-control" id="lname_update">
		   			</div>
   					<div class="col-md-6">
		   				<label for="Email">Email</label>
				        <input type="text" class="form-control" id="email_update">
		   			</div>
   					<div class="col-md-6">
		   				<label for="position">Position</label>
				        <input type="text" class="form-control" id="position_update">
		   			</div>
	   			</div>
			</div>
	        <div class="modal-footer">
	          <button type="button" id="updatemember" class="btn btn-warning">Update</button>
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	      
	    </div>
	  </div>
  
</div>
</body>
</html>
<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Custom Scripts -->
<script type="text/javascript">
	$( document ).ready(function() {
		/*Append Update*/
		$(".appendupdate").click(function(){
		 	var id         = $(this).closest('tr').children('td.id_mem').text(); 
			var first_name = $(this).closest('tr').children('td.first_name').text();  
			var last_name  = $(this).closest('tr').children('td.last_name').text();  
			var email      = $(this).closest('tr').children('td.email').text();  
			var position   = $(this).closest('tr').children('td.position').text();  
			$('#id_update').val(id);
			$('#fname_update').val(first_name);
			$('#lname_update').val(last_name);
		    $('#email_update').val(email);
			$('#position_update').val(position);  
		});		
		/*Add*/
		$("#addmember").click(function(){
			 var first_name  = $('#fname').val();
			 var last_name   = $('#lname').val();
			 var email       = $('#email').val();
			 var position    = $('#position').val();  
			 
		    $.ajax({
	            url:"<?php echo base_url(); ?>Cruds/add",
	            method:"POST",
	            data:{
	                first_name: first_name,
	                last_name : last_name,
	                email     : email,
	                position  : position,
	            },
	            success:function(data)
	            {
	            }
	        });	
        });	
		
		/*Delete*/
		$(".id").click(function(){
			var id = $(this).val(); 
		    $.ajax({
	            url:"<?php echo base_url(); ?>Cruds/delete",
	            method:"POST",
	            data:{
	                id: id,
	            },
	            success:function(data)
	            {
	            }
	        })
		});
		/*Append*/
		$("#updatemember").click(function(){
			var id          = $('#id_update').val();
			var first_name  = $('#fname_update').val();
			var last_name   = $('#lname_update').val();
			var email       = $('#email_update').val();
			var position    = $('#position_update').val();  
			 
		    $.ajax({
	            url:"<?php echo base_url(); ?>Cruds/update",
	            method:"POST",
	            data:{
	            	id		  : id,
	                first_name: first_name,
	                last_name : last_name,
	                email     : email,
	                position  : position,
	            },
	            success:function(data)
	            {
	            }
	        })
		});
	});
</script>