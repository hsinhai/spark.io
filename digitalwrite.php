<html>
<head>
<title>Spark LED on/off from php & form post</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
//level from the form post
	$level=$_POST["level"];
 
//replace with your access token, you can find this in the build page, under SETTINGS
//$my_access_token="1234123412341234123412341234123412341234"; 
	$my_access_token=$_POST["my_access_token"];

//replace with your core device ID, you can find ID in the build page, under CORES
//$my_device="0123456789abcdef01234567"; 
	$my_device=$_POST["my_device"];

//this is the pin with the mini blue LED, so easy to test
	$output_pin="D7"; 

//some text just for reference to make sure things are going right
	echo("You set: " . $output_pin . ", " . $level . "<br><br>");
	echo("Below is the response from Cloud API:<br><br>");

//the important part, curl
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"https://api.spark.io/v1/devices/" . $my_device . "/digitalwrite");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,"access_token=" . $my_access_token . "&params=" . $output_pin . "," . $level);
	curl_exec ($ch);
	curl_close ($ch);
	}
?>
<br><br>
<FORM METHOD=POST enctype="multipart/form-data" ACTION="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Access Token: <input type="text" name="my_access_token" value="<?php echo($my_access_token);?>"><br>
Device ID: <input type="text" name="my_device" value="<?php echo($my_device);?>"><br>
<label for="level_high">HIGH</label><input type="radio" id="level_high" name="level" value="HIGH" checked="checked"/>
<label for="level_low">LOW</label><input type="radio" id="level_low" name="level" value="LOW"/>
<input type="Submit" name="Submit" value="Submit">
</form>
</body>
</html>
