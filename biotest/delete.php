<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the questions table
*/
 // connect 
 include('connect-db.php');
  // delete the entry
 if (isset($_GET['quid']) && is_numeric($_GET['quid']))
 {
 $quid = $_GET['quid']; 

 $result = mysql_query("DELETE FROM questions WHERE quid=$quid")
 or die(mysql_error()); 
 
 // home
 header("Location: http://www.kadyszewski.com/biotest/view.php"); 
 }
 else
 {
 header("Location: http://www.kadyszewski.com/biotest/view.php"); 
 } 
?>
                            