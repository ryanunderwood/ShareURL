<?php

// MySQL Connect. Using PDO.
$host = 'localhost';
$dbname = 'shareurl';
$user = 'user';
$pass = 'password';

$db = new PDO('mysql:host=$host;dbname=$dbname;charset=utf-8', $user, $pass,
    array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
class dbget
{

    // Used to check if the generated code is already in use. This could be simplified.
    public function count($a, $db) {
        $stmt = $db->prepare('select * from urls where binary code=:code');
        $stmt->bindValue(':code', $a);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }

    // Used to add the URL and code to database.
    public function add($a, $b, $db) {
        $stmt = $db->prepare('insert into urls (code, url) values (:code, :url)');
        $stmt->bindValue(':code', $a);
        $stmt->bindValue(':url', $b);
        $stmt->execute();
        $affected = $stmt->rowCount($a, $b);
        return $affected;
    }

    //Used to check if inputted URL is blocked in `blocked` table.
    public function isblocked($a, $db) {
        $url = "http://" . parse_url($a, PHP_URL_HOST); // Concatenating http:// to the base domain name.
        $stmt = $db->prepare('select * from blocked where url = :url');
        $stmt->bindValue(':url', $url);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }

    //Used to check what URL the code points to. Returns 0 if not results.
    public function getURL($a, $db) {
        $stmt = $db->prepare('select url from urls where binary code = :code');
        $stmt->bindValue(':code', $a);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $url = 0;
        foreach($stmt as $row) {
            $url = $row['url'];
        }
        return $url;
    }
}
?>
