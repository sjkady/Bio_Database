<?php
/* 
 add_print.PHP
 adds a specific entry from the questions table to print test database
*/

 // connect 
 include('connect-db.php');
  // delete the entry

mysql_query("TRUNCATE table test")
 or die(mysql_error()); 
 
 // home
 header("Location: view.php");

 
?>