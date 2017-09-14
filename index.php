<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>e-Reports</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="DataTables/media/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="DataTables/media/css/select.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="DataTables/media/css/fixedColumns.dataTables.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="DataTables/media/css/colReorder/colReorder.dataTables.min.css"> -->
</head>
<body>
		
	<div class="container">
		<div class="row">
			<form class="form" id="inputForm" action="" method="POST">
				<div class="col-md-1 text-center form-horizontal">
					<div class="form-group">
					    <button type="button" class="btn btn-default btn-block" id="btn_send">
						    <span class="glyphicon glyphicon-envelope"></span><br>
						    Send
					    </button>
					</div>
				</div>
				<div class="col-md-7 form-horizontal">
					<div class="form-group">
						<label align="right" class="col-sm-2" for="to">To:</label>
						<div class="col-sm-10">
							<input class="form-control input-sm" type="text" name="to" id="to" />
						</div>
					</div>
					<div class="form-group">
						<label align="right" class="col-sm-2" for="cc">Cc:</label>
						<div class="col-sm-10">
							<input class="form-control input-sm" type="text" name="cc" id="cc" />
						</div>
					</div>
					<div class="form-group">
						<label align="right" class="col-sm-2" for="subject">Subject:</label>
						<div class="col-sm-10">
							<input class="form-control input-sm" type="text" name="subject" id="subject" />
						</div>
					</div>
				</div>

				<div class="col-md-4 form-horizontal">
					<div class="form-group">
						<label align="right" class="col-sm-2" for="report_type">Report:</label>
						<div class="col-sm-10">
						    <select class="form-control input-sm" name="report_type" id="report_type">
						       <option value="inspection">Inspection</option>
					  	       <option value="incident">Incident</option>
						    </select>
						</div>
					</div>
					<div class="form-group">
					    <label align="right" class="col-sm-2" for="attachment">Photo(s): </label>
						<div class="col-sm-10">
						    <select class="form-control input-sm" name="attachment" id="attachment">
								<option value="1">1</option>
								<option value="4">4</option>
								<option value="7">7</option>
								<option value="10">10</option>
								<option value="13">13</option>
								<option value="16">16</option>
								<option value="19">19</option>
								<option value="22">22</option>
								<option value="24">24</option>
						    </select>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<div id="status"></div>
		<hr>

		<div class="table-responsive">
			<table id="myTable" class="table table-bordered table-hover table-striped" cellspacing="0" width="100%">
				<thead align="center">
					<tr>
						<th class="success">&nbsp;</th>
						<th class="success">ID</th>
						<th class="success">Division</th>
						<th class="success">Date</th>
						<th class="success">Company</th>
						<th class="success">Facility</th>
						<th class="success">Location</th>
						<th class="success">Report</th>
					</tr>
				</thead>
				<tbody></tbody>
				<tfoot align="center">
					<tr>
						<th class="success">&nbsp;</th>
						<th class="success">ID</th>
						<th class="success">Division</th>
						<th class="success">Date</th>
						<th class="success">Company</th>
						<th class="success">Facility</th>
						<th class="success">Location</th>
						<th class="success">Report</th>
					</tr>
				</tfoot>
			</table>
		</div>
			
		<hr>

		<div class="row">
		    <div class="col-lg-12">
		        <ul class="nav nav-pills nav-justified">
		            <li><a href="#"><span>© 2016 JEFFREY B. BALMES</span></a></li>
		        </ul>
		    </div>
		</div>
	</div>

<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script> 
<script type="text/javascript" src="DataTables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="DataTables/media/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="DataTables/media/js/dataTables.fixedColumns.min.js"></script>
<!-- <script type="text/javascript" src="DataTables/media/js/colReorder/dataTables.colReorder.min.js"></script> -->

</body>
</html>




