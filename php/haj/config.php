<?php

define ("DB_HOST", "localhost"); 

define ("DB_USER", "root"); 

define ("DB_PASS","12345678"); 

define ("DB_NAME","hajjwallet");



$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");

$db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");

?>