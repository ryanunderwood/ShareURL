<?php
require "inc/db.inc.php";
require "inc/gen.inc.php";
$yoururl = "http://example.org/"; // requires trailing slash
$url = $_POST['url'];
if (!isset($_POST['url']) || ctype_space($_POST['url']) || empty($_POST['url'])) die(header("Location: index.php?empty"));
if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED)) die(header("Location:index.php?filter"));
$dbget = new dbget();
$blocked = $dbget->isblocked($url, $db);
if ($blocked !==0) die("That URL is blocked.");
$code = genCode();
while ($dbget->count($code, $db) == 1) {
    $code = genCode();
}
$dbget->add($code, $url, $db);
if ($dbget == 1) {
    echo "Your short URL is <a href=\"$yoururl$code\">$yoururl$code</a>.";
}
else {
    die("Uh-oh, something went wrong.");
}
?>
