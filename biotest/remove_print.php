<?php
/* 
 add_print.PHP
 adds a specific entry from the questions table to print test database
*/

 // connect 
 include('connect-db.php');
  // delete the entry
 if (isset($_GET['quid']) && is_numeric($_GET['quid']))
 {
 $quid = $_GET['quid']; 

mysql_query("DELETE FROM test WHERE quid=$quid")
 or die(mysql_error()); 
 
 // home
 header("Location: view.php");
 }
 else
 {
 header("Location: view.php");
 }
 
?>