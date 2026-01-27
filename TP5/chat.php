<?php
require_once('database.php');

$db = dbConnect();

if (isset($_GET['request'])) {
    header('Content-Type: application/json');
    
    if ($_GET['request'] == 'channels') {
        echo json_encode(dbGetChannels($db));
    }
    exit;
}
?>