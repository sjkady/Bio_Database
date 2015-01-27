<?php
/* 
 add_print.PHP
 adds a specific entry from the questions table to print test database
*/

 // connect 
 include('connect-db.php');
  // add the entry
 if (isset($_GET['quid']) && is_numeric($_GET['quid']))
 {
 $quid = $_GET['quid'];
 $sql = "SELECT quid FROM test where quid=$quid";
 $query = mysql_query($sql);

    if(mysql_num_rows($query)){//check is question is already on table
      
    } else {//if not add to the table
      mysql_query("INSERT test SET quid='$quid'")
	or die(mysql_error());
    }
 
 
 
 
 	


// home
header("Location: view.php");
}
else
{
header("Location: view.php");
}
?>