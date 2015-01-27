<!DOCTYPE BIO TEST>

<html> 
 <title>Test Print</title>
 <body>
 <h1>BIOLOGY TEST</h1>
 <p><strong>Answer the following multiple choice questions.</strong></p>


<?php

include('connect-db.php');

$query= "SELECT questions.question, questions.incorrectAnswer1, questions.incorrectAnswer2, questions.incorrectAnswer3, answer FROM questions
INNER JOIN test
ON questions.quid=test.quid";

$count = 1; //number the test questions

$result = mysql_query($query);
echo "</br>";
echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
//generate random number for incorrect/correct ordering


$random = rand(0,3);
if($random==0){
	$A = $row['answer'];
	$B = $row['incorrectAnswer1'];
	$C = $row['incorrectAnswer2'];
	$D = $row['incorrectAnswer3'];
}
elseif($random==1){
	
	$A = $row['incorrectAnswer1'];
	$B = $row['answer'];
	$C = $row['incorrectAnswer2'];
	$D = $row['incorrectAnswer3'];
}
elseif($random==2){
	
	$A = $row['incorrectAnswer1'];
	$B = $row['incorrectAnswer2'];
	$C = $row['answer'];
	$D = $row['incorrectAnswer3'];
}
elseif($random==3){
	$A = $row['incorrectAnswer1'];
	$B = $row['incorrectAnswer2'];
	$C = $row['incorrectAnswer3'];
	$D = $row['answer'];
}


echo "<tr><td> $count. "  . $row['question'] . "</td></tr>" ;  //$row['index'] the index here is a field name
echo "<tr><td> A. " . $A . "</td></tr>" ;
echo "<tr><td> B. " . $B .  "</td></tr>" ;
echo "<tr><td> C. " . $C .  "</td></tr>" ;
echo "<tr><td> D. " . $D .  "</td></tr>" ;
echo "<tr><td> &nbsp;  </td></tr>";



$count++;
}

echo "</table>"; //Close the table in HTML

mysql_close(); 

?>


</body>
 </html>