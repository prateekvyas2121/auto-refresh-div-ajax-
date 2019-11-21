<?php
include 'config.php';
	
$sel = "SELECT * FROM `tbl_tweet`";

 $res=mysql_query($sel);
 if (mysql_num_rows($res) > 0) {
 	while ($row = mysql_fetch_array($res )) {
 		# code...
 		echo '<p>'.$row['tweet'].'</p>';
 	}
 	# code...
 }

?>