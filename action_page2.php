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

<h1>XML External Entity (XXE)</h1>

<hr width="100%" align="left">

<?php

$a = session_id();
if(empty($a)) session_start();
// echo "SID: ".SID."<br>session_id(): ".session_id()."<br>";

$value = 'Test_podaci_za_kolacic';
setcookie("TestCookie", $value, time() + 3600);  /* expire in 1 hour */

?>

<?php

$file = basename($_FILES["fileToUpload"]["name"]);
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$ranjivostOn = 1;

 //echo $file . "<br>";
 //echo $target_dir . "<br>";
 //echo $target_file . "<br>";
 //echo $imageFileType . "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field  
  if (empty($_POST['ftoggle2'])) {
    $ranjivostOn = 0;
  } else {
    $ranjivostOn = 1;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.<br>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "xml") {
  echo "Sorry, only XML files are allowed.<br>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file '". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). "' has been uploaded.<br>";
  } else {
    echo "Sorry, there was an error uploading your file.<br>";
  }
}

if ($uploadOk != 1)
{
	die("<br>Aborting...");
}

if ($ranjivostOn == 1 and $file == "data_bad.xml")
{
	echo "<script>javascript:alert(document.cookie);</script>";
	die();
}

$reader = new XMLReader();

if (!$reader->open($target_file)) {
    die("<br>Failed to open " . $target_file);
}

echo "<br>File content: <br>";

while($reader->read()) {
  if ($reader->nodeType == XMLReader::ELEMENT && $reader->name == 'building') {
    $address = $reader->getAttribute('address');
    $latitude = $reader->getAttribute('lat');
    $longitude = $reader->getAttribute('lng');
	echo $address . " " . $latitude . " " . $longitude . "<br>";
	}
}

$reader->close();

?>

</body>
</html>