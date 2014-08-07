<?php

/**
* Author: ManuDavila
* Github: https://github.com/ManuDavila/json-file-reader
* Website: http://jquery-manual.blogspot.com
**/

require "json-file-reader.class.php";

/* Create json file */
$json = array
    (
	 "images" => array
	   (
	    ["images/php.png", "PHP is the best"],
		["images/zend.png", "Zend Framework"],
		["images/yii.png", "Yii Framework"],
		["images/symfony.png", "Symfony Framework"],
	   ),
	);
	
$json = json_encode($json);

$handler = fopen("images.json", "w");
fwrite($handler, $json);
fclose($handler);
/* Create json file */

/* Now reader the json file */
$reader = new json_file_reader();
$json = $reader->json("images.json");
?>

<!DOCTYPE HTML>
<html>
<head>
<title>json file reader</title>
<style>
body {
margin: 0;
padding: 0;
}

.container
{
margin: 20px;
}
</style>
</head>
<body>
<div class="container">
<h1>php json file reader</h1>
<h5>This class allow open and read a json file and extract the content it in array format</h5>
<h3>Use: </h3>
<pre>
$reader = new json_file_reader();
$json = $reader->json("images.json");
print_r($json);
</pre>
<h3>images.json</h3>
<?php print_r($json) //show images.json content ?>

<h3>My Gallery</h3>
<?php
/* Get the images */
foreach ($json as $key => $val)
{
    if ($key == "images")
	 {
	  foreach ($json['images'] as $i => $v)
	  {
	  print "<img src='".$json[$key][$i][0]."' rel='".$json[$key][$i][1]."' title='".$json[$key][$i][1]."'>\n";
	  }
	 }
}
?>
<br>
<br>
<a href="https://github.com/ManuDavila/json-file-reader" target="_blank"><strong>Github</strong></a> | <a href="http://www.phpclasses.org/browse/author/1255792.html" target="_blank"><strong>phpclasses.org</strong></a>
<br>
<br>
</div>
</body>
</html>