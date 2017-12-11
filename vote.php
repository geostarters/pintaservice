<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-type: application/json');

$filename = "db/votes.db";
$db  = new SQLite3($filename) or die('Unable to open database');

/*
$query = <<<EOD
  CREATE TABLE IF NOT EXISTS votes (
    map STRING PRIMARY KEY,
    likes INT)
EOD;

$db->exec($query) or die('Create db failed');
*/

if(isset($_GET['map'])) {
  $map = $_GET['map'];
  $map = SQLite3::escapeString($map);
  $query_string = <<<EOF
    INSERT OR IGNORE INTO votes (map,likes) VALUES ('$map', 0);
    UPDATE votes SET likes = likes + 1 WHERE map LIKE '$map';
EOF;
  $db->exec($query_string);
  $json = array('status' => "OK");
  echo json_encode($json);
}else{
  $result = $db->query('SELECT * FROM votes') or die('Query failed');
  $json = array();
  while ($row = $result->fetchArray(SQLITE3_ASSOC)){
    $json[] = $row;
  }
  echo json_encode($json);
}
?>
