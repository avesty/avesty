<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
table.db-table 		{ border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
</style>		
</head>
<?php

include_once 'app/db_functions.php';
$db = new DB_Functions();

/* show tables */
$result = $db->getAlLTables();
while($tableName = mysql_fetch_row($result)) {
	$table = $tableName[0];
	echo '<h3>',$table,'</h3>';
	$result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
	if(mysql_num_rows($result2)) {
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';		
		while($row2 = mysql_fetch_row($result2)) {			
			$counter = 0;
			foreach($row2 as $key=>$value) {
				if($counter % 3 == 0 && $value != 'PRI' && $value != "" && $value != null)
					echo '<th>',$value,'</th>';
				$counter = $counter + 1;
			}
		}		
		$result2 = mysql_query('SELECT * FROM '.$table) or die('cannot show columns from '.$table);
		while($row2 = mysql_fetch_row($result2)) {
			echo '<tr>';
			foreach($row2 as $key=>$value) {
				echo '<td> ',$value,'  </td>';
			}
			echo '</tr>';
		}
		echo '</table><br />';
	}
}
?>
</body>
</html>