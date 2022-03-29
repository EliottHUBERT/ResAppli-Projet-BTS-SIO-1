<?php
$salt = "pfJ54Mqs29";
$pwd="Prixy12345";
$pwd=md5($salt.$pwd);
echo $pwd;
?>