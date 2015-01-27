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
	VIEW-PAGINATED.PHP
	Displays all data from questions with a pagination option
*/

	// connect to the database
	include('connect-db.php');
	
	// number of results to show per page
	$per_page = 3;
	
	// figure out the total pages in the database
	$result = mysql_query("SELECT * FROM questions");
	$total_results = mysql_num_rows($result);
	$total_pages = ceil($total_results / $per_page);

	// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
	if (isset($_GET['page']) && is_numeric($_GET['page']))
	{
		$show_page = $_GET['page'];
		
		// make sure the $show_page value is valid
		if ($show_page > 0 && $show_page <= $total_pages)
		{
			$start = ($show_page -1) * $per_page;
			$end = $start + $per_page; 
		}
		else
		{
			$start = 0;
			$end = $per_page; 
		}		
	}
	else
	{
		$start = 0;
		$end = $per_page; 
	}
	
	echo "<p><a href='view.php' style='text-decoration:none;'>View All</a> | View Page: ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='view-paginated.php?page=$i' style='text-decoration:none;'>$i</a> ";
	}
	echo "</p></br>";
		
	// display  table
	echo "<div style='overflow:auto; '>";
	echo "<table class='table1'>";
	echo "<thead><tr> <th></th>  <th scope='col'>Edit</th> <th scope='col'>Delete</th> <th scope='col'>Add to Test</th> <th scope='col'>Remove from Test</th><th scope='col'>Question</th> <th scope='col'>Answer</th> <th scope='col'>Subject</th> <th scope='col'>incorrectAnswer1</th> <th scope='col'>incorrectAnswer2</th> <th scope='col'>incorrectAnswer3</th> <th scope='col'>discriminationIndex</th>  <th scope='col'>pointBiserial</th> <th scope='col'>difficulty</th>  </tr> </thead>";
	for ($i = $start; $i < $end; $i++)
	{
		if ($i == $total_results) { break; }
		echo "<tr>";
		echo '<th scope="row">' . mysql_result($result, $i, 'quid') . '</td>';
		echo '<td><a href="edit.php?quid=' . mysql_result($result, $i, 'quid') . '"><img src="images/edit.png" alt="edit" width="24" height="24"></a></td></a></td>';
		echo '<td><a href="delete.php?quid=' . mysql_result($result, $i, 'quid') . '"><img src="images/delete.png" alt="delete" width="24" height="24"></a></td></a></td>';
		echo '<td><a href="add_print.php?quid=' . $row['quid'] . '"><img src="images/add2.png" alt="add to test" width="24" height="24"></a></td>';
		echo '<td><a href="remove_print.php?quid=' . $row['quid'] . '"><img src="images/remove.png" alt="delete" width="24" height="24"> </a></td>';
		echo '<td>' . mysql_result($result, $i, 'question') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'answer') . '</td>';
		echo '<td>' . mysql_result($result, $i, 'subject') . '</td>';
		echo '<td>' . mysql_result($result, $i,'incorrectAnswer1') . '</td>';
		echo '<td>' . mysql_result($result, $i,'incorrectAnswer2') . '</td>';
		echo '<td>' . mysql_result($result, $i,'incorrectAnswer3') . '</td>';
		echo '<td>' . mysql_result($result, $i,'discriminationIndex') . '</td>';
		echo '<td>' . mysql_result($result, $i,'pointBiserial') . '</td>';
		echo '<td>' . mysql_result($result, $i,'difficulty') . '</td>';
		echo "</tr>"; 
	}
	// close table>
	echo "</table>"; 
	echo"</div>";
		
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
</div>
</html>