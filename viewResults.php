<html>
<head></head>

<body>
<p>
<select id="selectViewReports">
	<option value="0">Please Select a Report</option>
	<option value="1">Parties</option>
	<option value="2">Constituencies</option>
	<option value="3">parties and Constiuencies</option>
</select>
</p>

<p><a href="home.php">Home</a> | <a href="viewResults.php">Results Home</a></p>

<div id="viewReports">
<?php 

if( isset( $_GET['viewreportid'] ) ) {
	$viewReport = $_GET['viewreportid'];
	
	if( $viewReport != 0 || !empty($viewReport ) ) {
		include 'viewReports.php';
	}
}

?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="js/viewResults.js"></script>
</body>
</html>

<?php

