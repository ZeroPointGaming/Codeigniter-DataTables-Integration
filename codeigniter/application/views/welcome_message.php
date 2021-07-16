<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Welcome to CodeIgniter</title>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
		


		<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
		</style>
	</head>

	<body>
		<div id="container">
			<h1>Welcome to Justins CodeIgniter DataTables Integration Project!</h1>

			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

			<!-- Database Populated Table -->
			<table id="main_table" class="display" style="width:100%">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Age</th>
						<th>Id</th>
						<th>Actions</th>
					</tr>
				</thead>
					
			</table>

			<!-- Forms Container -->
			<div style="display:inline">
				<!-- Form to add users to the database -->
				<form action="<?php echo site_url("welcome/add_new_person")?>" method="post" style="margin-left:5%;margin-right:5%;">
					<label for="AddTitleLabel">Add Person To Database:&nbsp;</label>	
				
					<div class="form-row">
						<div class="col">
							<input type="text" class="form-control" name="first_name" placeholder="First name"/>
							<input type="text" class="form-control" name="last_name" placeholder="Last name"/>
						</div>
					</div>

					<div class="form-row">
						<div class="col">
							<input type="text" class="form-control" name="age" placeholder="Age"/>
							<input type="text" class="form-control" name="id" placeholder="Database ID"/>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Add User</button>
						</div>
					</div>
				</form>
			</div>

			<!-- Load the DataTables via jQuery -->
			<script type="text/javascript">
				$(document).ready(function(){
					var dataTable = $('#main_table').DataTable({
						"ajax":{
								url:"<?php echo site_url("welcome/people_page") ?>",
								type:"GET"
						},
					});
				});
			</script>

			 
		</div>
	</body>
</html>