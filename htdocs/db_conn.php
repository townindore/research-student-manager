<?php
$lnk = mysql_connect('localhost', 'root', 'root') or die ('Not connected : ' . mysql_error());
mysql_select_db('research_student_manager', $lnk) or die ('Can\'t use bl_db : ' . mysql_error());
?>