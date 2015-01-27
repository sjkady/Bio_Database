<?php
/* 
 CONNECT-DB.PHP
 PHP to connect to your database
*/
 $server = 'localhost';
 $user = 'kadyszew_johnk';
 $pass = 'Steven12';
 $db = 'kadyszew_bio'; 
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n" . mysql_error ());
?>