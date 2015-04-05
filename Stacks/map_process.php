<?php
//PHP 5 +
error_reporting(E_ALL);
// database settings 
$db_username = 'utw10077';
$db_password = 'theStacks6883';
$db_name = 'utw10077';
$db_host = 'mysql.utweb.utexas.edu';

//$db_username = 'root';
//$db_password = 'root';
//$db_name = 'stacks';
//$db_host = 'localhost';

//mysqli
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

exec('curl -v -X PURGE -D - "http://utw10077.utweb.utexas.edu/*"');
exec('curl -v -X PURGE -D - "http://utw10077.utweb.utexas.edu/*"');
exec('curl -v -X PURGE -D - "http://utw10077.utweb.utexas.edu/*"');
exec('curl -v -X PURGE -D - "http://utw10077.utweb.utexas.edu/*"');
exec('curl -v -X PURGE -D - "http://utw10077.utweb.utexas.edu/*"');

if (mysqli_connect_errno()) 
{
	header('HTTP/1.1 500 Error: Could not connect to db!'); 
	exit();
}

################ Save & delete markers #################
if($_POST) //run only if there's a post data
{
	//make sure request is comming from Ajax
	$xhr = $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'; 
	if (!$xhr){ 
		header('HTTP/1.1 500 Error: Request must come from Ajax!'); 
		exit();	
	}
	
	// get marker position and split it for database
	$mLatLang	= explode(',',$_POST["latlang"]);
	$mLat 		= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
	$mLng 		= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
	
	//Delete Marker
	if(isset($_POST["del"]) && $_POST["del"]==true)
	{
		$results = $mysqli->query("DELETE FROM markers WHERE lat=$mLat AND lng=$mLng");
		if (!$results) {  
		  header('HTTP/1.1 500 Error: Could not delete Markers!'); 
		  exit();
		} 
		exit("Marker removed");
	}
	
	$mName 		= filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$mDescription 	= filter_var($_POST["description"], FILTER_SANITIZE_STRING);
	$mStyle = filter_var($_POST["winStyle"], FILTER_SANITIZE_STRING);
	$mPinURL = filter_var($_POST["mapPinURL"], FILTER_SANITIZE_STRING);
	//$mMarkerTitle 	= filter_var($_POST["markerTitle"], FILTER_SANITIZE_STRING);
	//$mType		= filter_var($_POST["type"], FILTER_SANITIZE_STRING);
	
	$results = $mysqli->query("INSERT INTO markers (name, description, lat, lng, winStyle, mapPinURL) VALUES ('$mName','$mDescription',$mLat, $mLng, '$mStyle', '$mPinURL')");
	if (!$results) {  
		  header('HTTP/1.1 500 Error: Could not create marker!'); 
		  exit();
	} 
	
	$output = '<div class="saved-info saved-title">'.$mName.'</div><p><div class="saved-info saved-description">'.$mDescription.'</div></p>';
	exit($output);
}


################ Continue generating Map XML #################

//Create a new DOMDocument object
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers"); //Create new element node
$parnode = $dom->appendChild($node); //make the node show up 

// Select all the rows in the markers table
$results = $mysqli->query("SELECT * FROM markers WHERE 1");
if (!$results) {  
	header('HTTP/1.1 500 Error: Could not get markers!'); 
	exit();
} 

//set document header to text/xml
header("Content-type: text/xml"); 

// Iterate through the rows, adding XML nodes for each
while($obj = $results->fetch_object())
{
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);   
  $newnode->setAttribute("name",$obj->name);
  $newnode->setAttribute("description", $obj->description);  
  $newnode->setAttribute("lat", $obj->lat);  
  $newnode->setAttribute("lng", $obj->lng); 
  $newnode->setAttribute("winStyle", $obj->winStyle);
  $newnode->setAttribute("mapPinURL", $obj->mapPinURL);
  //$newnode->setAttribute("type", $obj->type);	
}

echo $dom->saveXML();
?>
