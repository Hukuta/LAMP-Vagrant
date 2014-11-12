<?php

$link = mysql_connect('localhost', 'root', 'password');
if (!$link) 
    die(mysql_error());
else
    mysql_close($link);

echo phpinfo();
