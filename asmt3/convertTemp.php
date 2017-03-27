<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CSIS 311 - Server-Side Scripting - Brekke - 688</title>
<link rel="stylesheet" type="text/css" href="../main.css" />
</head>

<body>
<div id="page">

<div id="header">
	<h1>CSIS 311 - Casey Bladow</h1>
</div>

<div id="menu">
  <p>
    <ul>
    <li><a href="http://puff.mnstate.edu/~bladowca/private/">Home</a><br/></li>
    <li><a href="http://puff.mnstate.edu/~bladowca/private/asmt1/index.html">Assignment 1</a><br/></li>
    <li><a href="http://puff.mnstate.edu/~bladowca/private/asmt2/index.html">Assignment 2</a><br/></li>
    <li><a href="http://puff.mnstate.edu/~bladowca/private/asmt3/index.html">Assignment 3</a><br/></li> 
    <li><a href="mailto:bladowca@mnstate.edu">Email</a></li>
    </ul>
    <br/>
  </p>
</div>

<div id="main">

<?php
//F = C * 1.8 + 32
$msg = "";

if ($_REQUEST['CtoF']):

	$temp_temp = $_REQUEST['temp_temp'];
	$f_temp = $temp_temp * 1.8 + 32;
	$stripLetters = preg_replace("/[^0-9]/", "", $temp_temp);
	
	if (empty($temp_temp) || empty($stripLetters)):
		$msg = "Please enter a temp to convert.";
	
	else: 
	$msg = "<b>$temp_temp</b> degrees Celcius is equal to <b>$f_temp</b> degrees Fahrenheit.";
	endif;
endif;

//C = (F -32) * .56

if ($_REQUEST['FtoC']):

	$temp_temp = $_REQUEST['temp_temp'];
	$c_temp = ($temp_temp - 32) * .56;
	$stripLetters = preg_replace("/[^0-9]/", "", $temp_temp);
	
	if (empty($temp_temp) || empty($stripLetters)):
		$msg = "Please enter a temp to convert.";
	
	else: 
	$msg = "<b>$temp_temp</b> degrees Fahrenheit is equal to <b>$c_temp</b> degrees Celcius.";
	endif;
endif;

?>

<p>This page will convert temperatures...</p>

<form method="POST" action="convertTemp.php">
	<input type="text" name="temp_temp" value="" />
	<input type="submit" name="FtoC" value="Fahrenheit to Celsius">
    <input type="submit" name="CtoF" value="Celsius to Fahrenheit">
</form>

<?php echo $msg ?><br/>

**0° MUST be enter as 00°**

<form action="index.html">
<input type="submit" name="backToindex" value="Back"/>
</form>
</div>

<div id="footer">
	<p class="copyright">&copy; 2014 Casey Bladow</p>
</div>

</div>
</body>
</html>
