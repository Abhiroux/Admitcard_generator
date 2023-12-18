<?php
$pdo = new PDO('mysql:dbname=db01;host=127.0.0.1;', 'Abhiroux', 'abhi123');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>