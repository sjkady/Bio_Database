<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>View Questions</title>
</head>
  <style>
    *{
      margin:0;
      padding:0;
    }
    body{
      font-family: Georgia, serif;
      font-size: 20px;
      font-weight: normal;
      letter-spacing: normal;
      background: #f0f0f0;
    }
    #content{
      background-color:#fff;
      width:auto;
      padding:70px;
      margin:0 auto;
      border-left:70px solid #00305e;
      border-right:1px solid #ddd;
      -moz-box-shadow:0px 0px 16px #aaa;
    }
    .head{
      font-family:Helvetica,Arial,Verdana;
      text-transform:uppercase;
      font-weight:bold;
      font-size:12px;
      font-style:normal;
      letter-spacing:3px;
      color:#888;
      border-bottom:3px solid #f0f0f0;
      padding-bottom:10px;
      margin-bottom:10px;
    }
    .head a{
      color:#1D81B6;
      text-decoration:none;
      float:right;
      text-shadow:1px 1px 1px #888;
    }
    .head a:hover{
      color:#f0f0f0;
    }
    #content h1{
      font-family:"Trebuchet MS",sans-serif;
      color:#1D81B6;
      font-weight:normal;
      font-style:normal;
      font-size:56px;
      text-shadow:1px 1px 1px #aaa;
    }
    #content h2{
      font-family:"Trebuchet MS",sans-serif;
      font-size:34px;
      font-style:normal;
      background-color:#f0f0f0;
      margin:40px 0px 30px -40px;
      padding:0px 40px;
      clear:both;
      float:left;
      width:100%;
      color:#aaa;
      text-shadow:1px 1px 1px #fff;
    }
    
      /* Table 1 Style */
      table.table1{
        font-family: "Trebuchet MS", sans-serif;
        font-size: 16px;
        font-weight: bold;
        line-height: 1.4em;
        font-style: normal;
        border-collapse:separate;
      }
      .table1 thead th{
        padding:15px;
        color:#fff;
        
        border:1px solid #00305z;
        border-bottom:3px solid #00305z;
        background-color:#00305e;
        
        -webkit-border-top-left-radius:5px;
        -webkit-border-top-right-radius:5px;
        -moz-border-radius:5px 5px 0px 0px;
        border-top-left-radius:5px;
        border-top-right-radius:5px;
      }
      .table1 thead th:empty{
        background:transparent;
        border:none;
      }
      .table1 tbody th{
        color:#fff;
        background-color:#00305e;
        border:1px solid #00305z;
        border-right:3px solid #00305z;
        padding:0px 10px;
        
        -moz-border-radius:5px 0px 0px 5px;
        -webkit-border-top-left-radius:5px;
        -webkit-border-bottom-left-radius:5px;
        border-top-left-radius:5px;
        border-bottom-left-radius:5px;
      }
      
      .table1 tbody tr:nth-child(2n+1) {
        background-color: #E8E8E8   ;
      }
      
      .table1 tbody tr:nth-child(2n) {
        background-color: #F0F0F8   ;
      }
      
      .table1 tbody td{
        padding:10px;
        text-align:center;
        background-color: #F0F0F0
          border: 2px solid   #F0F0F0;
        -moz-border-radius:2px;
        -webkit-border-radius:2px;
        border-radius:2px;
        color:#B8B8B8 ;
        text-shadow:1px 1px 1px #fff;
      }
      img
      {
        opacity:0.4;
        filter:alpha(opacity=40);
        /* For IE8 and earlier */
      }
      img:hover
      {
        opacity:1.0;
        filter:alpha(opacity=100);
        /* For IE8 and earlier */
      }
      
      input, textarea {
        padding: 9px;
        border: solid 1px #E5E5E5;
        outline: 0;
        font: normal 13px/100% Verdana, Tahoma, sans-serif;
        width: 200px;
        background: #FFFFFF;
        background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #000000), to(#FFFFFF));
        background: -moz-linear-gradient(top, #FFFFFF, #EEEEEE 1px, #FFFFFF 25px);
      }
      
      textarea {
        width: 400px;
        max-width: 400px;
        height: 80px;
        line-height: 150%;
      }
      
      input:hover, textarea:hover,
      input:focus, textarea:focus {
        border-color: #C9C9C9;
        -webkit-box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 8px;
        
      }
      
      .form label {
        margin-left: 10px;
        color: #999999;
      }
      
      .submit input {
        width: auto;
        padding: 9px 15px;
        background:#00305e;
        border: 0;
        font-size: 14px;
        color: #FFFFFF;
        border-radius: 10px;
        -moz-border-radius: 10px;
        -khtml-border-radius: 10px;
        -webkit-border-radius: 10px;
      }
      input, textarea {
        box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
        -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
        -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px;
      }
  </style>
<body>
<div id="content">
<p class="head">
        <strong>
          Question View
        </strong>
 </p>
 </br>
<?php
/* 
	VIEW.PHP
	Displays all questions
*/

	// connect 
	include('connect-db.php');

	// get results from database
	$result = mysql_query("SELECT * FROM questions") 
		or die(mysql_error());  
		
	// display table
	
	echo "<p>View All | <a href='view-paginated.php?page=1' style='text-decoration:none;' style='text-decoration:none;'>View Paginated</a></p></br>";
	echo "<div style='overflow:auto; '>";
	echo "<table class='table1'>";
	echo "<thead><tr> <th></th>  <th scope='col'>Edit</th> <th scope='col'>Delete</th> <th scope='col'>Add to Test</th> <th scope='col'>Remove from Test</th><th scope='col'>Question</th> <th scope='col'>Answer</th> <th scope='col'>Subject</th> <th scope='col'>incorrectAnswer1</th> <th scope='col'>incorrectAnswer2</th> <th scope='col'>incorrectAnswer3</th> <th scope='col'>discriminationIndex</th>  <th scope='col'>pointBiserial</th> <th scope='col'>difficulty</th>  </tr> </thead>";
	while($row = mysql_fetch_array( $result )) {
		echo '<tr id= "'. $row['quid'] .'">' ;
		echo '<th scope="row">' . $row['quid'] . '</td>';
		echo '<td><a href="edit.php?quid=' . $row['quid'] . '"><img src="images/edit.png" alt="edit" width="24" height="24"></a></td>';
		echo '<td><a href="delete.php?quid=' . $row['quid'] . '"><img src="images/delete.png" alt="delete" width="24" height="24"></a></td>';
		echo '<td><a href="add_print.php?quid=' . $row['quid'] . '"><img src="images/add2.png" alt="add to test" width="24" height="24"></a></td>';
		echo '<td><a href="remove_print.php?quid=' . $row['quid'] . '" onclick="changeColor('. $row['quid'] .');"><img src="images/remove.png" alt="delete" width="24" height="24"> </a></td>';
		echo '<td>' . $row['question'] . '</td>';
		echo '<td>' . $row['answer'] . '</td>';
		echo '<td>' . $row['subject'] . '</td>';
		echo '<td>' . $row['incorrectAnswer1'] . '</td>';
		echo '<td>' . $row['incorrectAnswer2'] . '</td>';
		echo '<td>' . $row['incorrectAnswer3'] . '</td>';
		echo '<td>' . $row['discriminationIndex'] . '</td>';
		echo '<td>' . $row['pointBiserial'] . '</td>';
		echo '<td>' . $row['difficulty'] . '</td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
	echo "</div>";
?>
</br>
<p class="head">         <strong>           Question Submission         </strong>  </p> 
<p><a href="new.php"><img src="images/add.png" alt="add" width="322" height="48"></a></p>
<br>
<p class="head">         <strong>           Print Test         </strong>  </p>
 <p><a href="print.php"><img src="images/print.png" alt="add" width="290" height="48"></a></p>
 </br>
<p class="head">         <strong>           Clear Test         </strong>  </p>
 <p><a href="clear.php"><img src="images/clear.png" alt="add" width="290" height="48"></a></p>
</div>
</body>
</html>	
                            