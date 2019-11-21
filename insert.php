<?php 
include 'config.php';

if(isset($_POST["tweet"]))
{
	$tweet = $_POST["tweet"];
     $ins = "INSERT INTO `tbl_tweet`(`tweet_id`,`tweet`) VALUES ('NULL','$tweet')";
		   
	$exec = mysql_query($ins) or die(mysql_error());
	if ($exec){
	   echo $tweet;
	}
	
}
else{
	echo "Internal server error";
}
?>
