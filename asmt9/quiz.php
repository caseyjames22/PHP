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
    <li><a href="http://puff.mnstate.edu/~bladowca/private/asmt4/index.html">Assignment 4</a><br/></li>
    <li><a href="http://puff.mnstate.edu/~bladowca/private/asmt5/index.php">Assignment 5</a><br/></li>
    <li><a href="http://puff.mnstate.edu/~bladowca/private/asmt6/index.html">Assignment 6</a><br/></li>
    <li><a href="http://puff.mnstate.edu/~bladowca/private/asmt7/index.html">Assignment 7</a><br/></li>
    <li><a href="http://puff.mnstate.edu/~bladowca/private/asmt8/index.html">Assignment 8</a><br/></li>
    <li><a href="http://puff.mnstate.edu/~bladowca/private/asmt9/index.html">Assignment 9</a><br/></li>
    <li><a href="mailto:bladowca@mnstate.edu">Email</a></li>
    </ul>
    <br/>
  </p>
</div>

<div id="main">

<form>
<?php
   extract($_GET);
   include("teams.php"); 
   
   if ($button == NULL)
   {
      $count = 0;
	  $correct = 0;
	  $incorrect = 0;
   }
   else
	echo "Question #" . ($count+1) . " of " . count($teams);
      $count++;
	  
   if ($count < count($teams) )
   {
       $team = nextTeam($teams,$used);
       $cAnswer = $teams[$team];
       echo <<< HERE
   <h2>What is $team MLB nickname?  $teams[$team] </br>
       <input type="text" name="guess" value="$guess" autocomplete="off">
       <input type="hidden" name="guess" value="$guess">
       <input type="hidden" name="cAnswer" value="$cAnswer">
   </h2>
  	<input type="submit" name="button" value="Submit">
HERE;

   }
   else
       echo "<h1>Done</h1>";
   
   if ($button == "Submit")
   {
   
   echo "$cAnswer";
	  echo "<h1>$guess</h1>";
      if ($guess == NULL || $guess != $cAnswer)
	  {
		echo "$guess";
         	echo "<h2>Incorrect!</h2>";
		$incorrect++;
		echo "Incorrect $incorrect";
	  }
      else
	  {
		echo "$guess";
         	echo "<h2>Correct!</h2>";
		$correct++;
		echo "Correct $correct";
	  }
   }
passData($used,count($teams));
echo <<< HERE
   <input type="hidden" name="count" value="$count">
   <input type="hidden" name="correct" value="$correct">
   <input type="hidden" name="incorrect" value="$incorrect"> 
HERE;

// ---------------functions---------------

function nextTeam($teams,&$used)
{
   do
   {
      $num = rand(0,count($teams)-1);
   }
   while ($used[$num]);
   $used[$num] = true;
   
   reset($teams);
   for ($i=0; $i<$num; $i++)
      next($teams);
   return key($teams);
}

function passData($used,$count)
{
   for ($i=0; $i<$count; $i++)
      echo <<< HERE
         <input type="hidden" name="used[$i]" value="$used[$i]">
HERE;
}
?>
</form>

<form action="../asmt9/index.html">
<input type="submit" name="backToindex" value="Back"/>
</form>
<form action="../index.html">
<input type="submit" name="backToindex" value="Home"/>
</form>
<form action="../asmt9/viewphp.php">
<input type="submit" name="viewphp" value="View PHP Source"/>
</form>

</div>

<div id="footer">
	<p class="copyright">&copy; 2014 Casey Bladow</p>
</div>

</div>
</body>
</html>
