<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_album = "localhost";
$database_album = "album";
$username_album = "root";
$password_album = "";
$album = mysql_pconnect($hostname_album, $username_album, $password_album) or trigger_error(mysql_error(),E_USER_ERROR); 
?>