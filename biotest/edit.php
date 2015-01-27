<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($quid, $question, $subject, $incorrectAnswer1, $incorrectAnswer2, $incorrectAnswer3, $discriminationIndex, $pointBiserial, $difficulty,  $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Question</title>
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
      
	  .submit input:hover{
     background: #383;
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
          Question Edit
        </strong>
 </p>
 </br>
 <?php 
 // errors
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="quid" value="<?php echo $quid; ?>"/>
 <div>
</br><input type="textarea" name="question" value="<?php echo $question; ?>"/> <label for="question">Question*</label><br/>
</br><input type="text" name="answer" value="<?php echo $answer; ?>"/> <label for="answer">Answer* </label><br/>
 </br><input type="text" name="subject" value="<?php echo $subject; ?>"/> <label for="subject">Subject* </label><br/>
 </br><input type="text" name="incorrectAnswer1" value="<?php echo $incorrectAnswer1; ?>"/> <label for="incorrectAnswer1">incorrectAnswer1* </label><br/>
 </br><input type="text" name="incorrectAnswer2" value="<?php echo $incorrectAnswer2; ?>"/> <label for="incorrectAnswer2">incorrectAnswer2* </label><br/>
 </br><input type="text" name="incorrectAnswer3" value="<?php echo $incorrectAnswer3; ?>"/> <label for="incorrectAnswer3">incorrectAnswer3* </label><br/>
 </br><input type="text" name="discriminationIndex" value="<?php echo $discriminationIndex; ?>"/> <label for="discriminationIndex">discriminationIndex* </label><br/>
 </br><input type="text" name="pointBiserial" value="<?php echo $pointBiserial; ?>"/> <label for="pointBiserial">pointBiserial* </label><br/>
 </br><input type="text" name="difficulty" value="<?php echo $difficulty; ?>"/> <label for="difficulty">difficulty* </label><br/>
 
</br><p>* required</p></br>
 <p class="submit">
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html>
</div> 
 <?php
 }



 // connect
 include('connect-db.php');
 
 // upon submission
 if (isset($_POST['submit']))
 { 
 if (is_numeric($_POST['quid']))
 {
 $quid = $_POST['quid'];
 $question = mysql_real_escape_string(htmlspecialchars($_POST['question']));
 $subject = mysql_real_escape_string(htmlspecialchars($_POST['subject']));
 $answer = mysql_real_escape_string(htmlspecialchars($_POST['answer']));
 $incorrectAnswer1 = mysql_real_escape_string(htmlspecialchars($_POST['incorrectAnswer1']));
 $incorrectAnswer2 = mysql_real_escape_string(htmlspecialchars($_POST['incorrectAnswer2']));
 $incorrectAnswer3 = mysql_real_escape_string(htmlspecialchars($_POST['incorrectAnswer3']));
 $discriminationIndex = mysql_real_escape_string(htmlspecialchars($_POST['discriminationIndex']));
 $pointBiserial = mysql_real_escape_string(htmlspecialchars($_POST['pointBiserial']));
 $difficulty = mysql_real_escape_string(htmlspecialchars($_POST['difficulty']));
 if ($question == '' || $subject == '' || $answer == '')
 {
 //errors
 $error = 'ERROR: fill all fields';
 
 //redisplay form
 renderForm($quid, $question, $subject, $incorrectAnswer1, $incorrectAnswer2, $incorrectAnswer3, $discriminationIndex, $pointBiserial, $difficulty, $error);
 }
 else
 {
 mysql_query("UPDATE questions SET question='$question', answer='$answer', subject='$subject', incorrectAnswer1='$incorrectAnswer1', incorrectAnswer2='$incorrectAnswer2', incorrectAnswer3='$incorrectAnswer3', discriminationIndex='$discriminationIndex', pointBiserial='$pointBiserial', difficulty='$difficulty' WHERE quid='$quid'")
 or die(mysql_error()); 
 header("Location: view.php"); 
 }
 }
 else
 {
 // error
 echo 'ERROR: Invalid id';
 }
 }
 else
  {
 
 
 if (isset($_GET['quid']) && is_numeric($_GET['quid']) && $_GET['quid'] > 0)
 {
 // query db
 $quid = $_GET['quid'];
 $result = mysql_query("SELECT * FROM questions WHERE quid=$quid")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 
 if($row)
 {
 
 // get data from db
 $question = $row['question'];
 $subject = $row['subject'];
 $answer = $row['answer'];
 $incorrectAnswer1 = $row['incorrectAnswer1'];
 $incorrectAnswer2 = $row['incorrectAnswer2'];
 $incorrectAnswer3 = $row['incorrectAnswer3'];
 $discriminationIndex = $row['discriminationIndex'];
 $pointBiserial = $row['pointBiserial'];
 $difficulty = $row['difficulty'];
 
 
 // show form
 renderForm($quid, $question, $subject, $incorrectAnswer1, $incorrectAnswer2, $incorrectAnswer3, $discriminationIndex, $pointBiserial, $difficulty, '');
 }
 else
  {
 echo "No results";
 }
 }
 else
  {
 echo 'ERROR: web id';
 }
 }
?>