<html>
<head>
<title>DB Example</title>
</head>
<body>
<?
$dbname = "bladowca_asmt14"; // replace with your database name
$username = "bladowca";  // replace with your username
$password = "Braindead1";  // replace xxxxx with your password, nobody can see it
extract($_POST);
print <<< HERE
   <form method="POST"> 
   <h2>Database: $dbname</h2>
   <h2>View Tables: 
         <input type="submit" name="button" value="people"><BR>
   </h2>
   </form>
   <form action="index.php">  <!-- change the action to where you want to go -->
      <input type="submit" value="return to assignment index">
   </form>
HERE;

if ($button == "people")
{
   print <<< HERE
      <form method="POST"> 
      <input type="submit" name="button" value="clear">
      </form>
HERE;
   $table = $button;
   $conn = mysql_connect("localhost",$username,$password);
   mysql_select_db($dbname, $conn);
   $sql = "select * from $table";
   $result = mysql_query($sql,$conn);
   
   // output the field names
   print "<h3>Field Names in the $table table</h3>";
   while ($field = mysql_fetch_field($result))
   {
      print "$field->name<br>\n";
   }
   
//   print "<br>";
   
   // output the records
   print "<h3>Records in the $table table</h3>";
   print "------------------<br>";
   while ($row = mysql_fetch_assoc($result))
   {
      foreach ($row as $col=>$val)
      {
         print "$col - $val<br>\n";
      }
      print "------------------<br>";
   }
}
?>

 
</body>
</html>
