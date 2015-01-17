<?php
require("db.inc.php");
$a = $_GET['a'];
if (!isset($_GET['a']) || ctype_space($_GET['a']) || empty($_GET['a'])) die(header("Location: index.php"));
$dbget = new dbget();
$url = $dbget->getURL($a, $db);
header("Location: $url");
?>
