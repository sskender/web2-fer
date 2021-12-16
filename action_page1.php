<html>	
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<style>
		body, h1, h2, h3, h4, h5, h6  {
		  font-family: Arial, Helvetica, sans-serif;
		}
		hr {
			border-top: 1px dashed red;
		}
	</style>
	<title>Drugi projekt iz Web2</title>
<body>

<h1>SQL ubacivanje (SQL Injection)</h1>

<hr width="100%" align="left">

<?php

$ranjivostOn = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['ftoggle1'])) {    
	echo "Ranjivost isključena" . "<br><br>";
  } else {
	$ranjivostOn = 1;
    echo "Ranjivost uključena" . "<br><br>";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['fname'];
	$pin = $_POST['pin'];

	if ($name == "' OR 1=1 #") {
		if ($ranjivostOn == 0)
			echo "<b>Pokušaj SQL ubacivanja je spriječen!</b><br><br>";
		else
			echo "<b>Pokušaj SQL ubacivanja nije spriječen!</b><br><br>";
	}

	echo "Unos u bazu: <br><br>";
	echo $name . "<br>";
	echo $pin . "<br>";
}

?>

</body>
</html>