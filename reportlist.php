<?php
require_once('phpmailer/class.phpmailer.php');
$conn=odbc_connect('php_access','','');

if (!$conn){
	exit("Connection Failed: " . $conn);
}

$sql="SELECT * FROM tblReport ORDER BY id DESC";
$rs=odbc_exec($conn,$sql);

if (!$rs){
	exit("Error in SQL");
}

$table = '';
while (odbc_fetch_row($rs)) {
	$table .='{
		  "action" : "<input type=\"checkbox\" value=\"'.odbc_result($rs,'id').'\" />",
		  "id" : "'.odbc_result($rs,'id').'",
		  "division" : "'.odbc_result($rs,'division').'",
		  "date" : "'.rtrim(odbc_result($rs,'dat'), "00:00:00").' '.odbc_result($rs,'time').'",
		  "company" : "'.odbc_result($rs,'company').'",
		  "facility" : "'.odbc_result($rs,'facility').'",
		  "location" : "'.odbc_result($rs,'location').'",
		  "regard" : "'.odbc_result($rs,'regard').'"
	},';
}

$table = substr($table, 0, strlen($table) - 1);
echo '{"data":['.$table.']}';
odbc_close($conn);
?>