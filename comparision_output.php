<?php


include 'Back_End/config.php';

$sql2 = "SELECT DISTINCT Search_query FROM battingdata";
$results = $db->query($sql2);
$results2 = $db->query($sql2);

?>

<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <style>
  


  </style>
</head>
<body>
<form method = 'post'>
    <select id='form' name='crick1'>
	<?php
 while($rows = $results->fetch_assoc())
 {	 
	echo"<option value = '$rows[Search_query]'>$rows[Search_query]</option>";
 }
	?>
	</select>
	<select id='form' name='crick2'>
	<?php
 while($rows = $results2->fetch_assoc())
 {	 
	echo"<option value = '$rows[Search_query]'>$rows[Search_query]</option>";
 }
	?>
	</select>
	<input type = 'submit'/>
</form>	
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
 echo"<h1 class='text-center'>$_POST[crick1]</h1>
    <h3 class='text-center'>Batting Data</h3>
<table class='table table-bordered'>
    <thead>
      <tr>
        <th>Tests</th>
        <th>ODIs</th>
        <th>T20Is</th>
		<th>First Class</th>
		<th>List A</th>
		<th>T20s</th>
      </tr>
	  </thead>
	  <tbody>";


$sql = "SELECT * FROM battingdata WHERE Search_query = '$_POST[crick1]'";
$result = $db->query($sql);
while($row = $result->fetch_assoc())
{	
	echo"  <tr>
	  <td>$row[Tests]</td>
	  <td>$row[ODIs]</td>
	  <td>$row[T20Is]</td>
	  <td>$row[First_class]</td>
	  <td>$row[List_A]</td>
	  <td>$row[T20s]</td>
	  </tr>";
}
	  
	  
echo" </tbody>
	  </table>
	  
<h1 class='text-center'>Bowling Data</h1>
<table class='table table-bordered'>
    <thead>
      <tr>
        <th>Tests</th>
        <th>ODIs</th>
        <th>T20Is</th>
		<th>First Class</th>
		<th>List A</th>
		<th>T20s</th>
      </tr>
	  </thead>
	  <tbody>";


$sql = "SELECT * FROM bowlingdata WHERE Search_query = '$_POST[crick1]'";
$result = $db->query($sql);
while($row = $result->fetch_assoc())
{	
	echo"  <tr>
	  <td>$row[Tests]</td>
	  <td>$row[ODIs]</td>
	  <td>$row[T20Is]</td>
	  <td>$row[First_class]</td>
	  <td>$row[List_A]</td>
	  <td>$row[T20s]</td>
	  </tr>";
}
	  
	  
echo" </tbody>
	  </table>	 
<h1 class='text-center'>$_POST[crick2]</h1>
<h1 class='text-center'>Batting Data</h1>
<table class='table table-bordered'>
    <thead>
      <tr>
        <th>Tests</th>
        <th>ODIs</th>
        <th>T20Is</th>
		<th>First Class</th>
		<th>List A</th>
		<th>T20s</th>
      </tr>
	  </thead>
	  <tbody>";


$sql = "SELECT * FROM battingdata WHERE Search_query = '$_POST[crick2]'";
$result = $db->query($sql);
while($row = $result->fetch_assoc())
{	
	echo"  <tr>
	  <td>$row[Tests]</td>
	  <td>$row[ODIs]</td>
	  <td>$row[T20Is]</td>
	  <td>$row[First_class]</td>
	  <td>$row[List_A]</td>
	  <td>$row[T20s]</td>
	  </tr>";
}
	  
	  
echo"  </tbody>
	  </table>	

<h1 class='text-center'>Bowling Data</h1>
<table class='table table-bordered'>
    <thead>
      <tr>
        <th>Tests</th>
        <th>ODIs</th>
        <th>T20Is</th>
		<th>First Class</th>
		<th>List A</th>
		<th>T20s</th>
      </tr>
	  </thead>
	  <tbody>";


$sql = "SELECT * FROM bowlingdata WHERE Search_query = '$_POST[crick2]'";
$result = $db->query($sql);
while($row = $result->fetch_assoc())
{	
	echo"  <tr>
	  <td>$row[Tests]</td>
	  <td>$row[ODIs]</td>
	  <td>$row[T20Is]</td>
	  <td>$row[First_class]</td>
	  <td>$row[List_A]</td>
	  <td>$row[T20s]</td>
	  </tr>";
}
	  
  
echo"	  </tbody>
	  </table>	";
}	  
?>	  
</body>
</html>