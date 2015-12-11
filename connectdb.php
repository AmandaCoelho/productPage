<?php
$db="aosdb";
$link = mysql_connect("localhost", "root", "root");
if (! $link) die("Couldn't connect to MySql");
mysql_select_db($db , $link) or die("Select DB Error: ".mysql_error());
print "Connected to DB";
?>