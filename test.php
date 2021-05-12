<?php
include("common.php");

echo "Is GET: ". common::isGet() ."</br>";
echo "Is POST: ". common::isPost() ."</br>";
// echo "Received content: ". stream_get_contents(STDIN);
echo "Received content: ". file_get_contents('php://input');

?>