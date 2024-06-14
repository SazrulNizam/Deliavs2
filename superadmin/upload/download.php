<?php

$filename = $_GET["id"];
$filepath = "FileHere/".$filename;

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type:  application/zip");
header("Content-Transfer-Encoding: binary");

readfile($filepath);
 exit;


?>
