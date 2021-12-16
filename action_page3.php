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

<h1>Nesigurna pohrana osjetljivih podataka (Sensitive Data Exposure)</h1>

<hr width="100%" align="left">

<?php

$ranjivostOn = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['ftoggle3'])) {    
	echo "Ranjivost isključena" . "<br><br>";
  } else {
	$ranjivostOn = 1;
    echo "Ranjivost uključena" . "<br><br>";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($ranjivostOn == 0)
	{
		echo "<b>Osjetljivi podaci (GDPR) su skriveni!<br>";
	}
	else
	{
		echo "<iframe src=\"gdpr_sheet.html\" style=\"height:500px;width:800px;\"></iframe>";
	}
}

?>

</body>
</html>