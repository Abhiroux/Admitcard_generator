<?php
$_SESSION['loggedin'] = false;
session_destroy();
header("location: index.html");
exit();
?>