<?php
$filename = basename($_GET["id"]);
$filepath = "upload/".$filename;

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type:  application/zip");
header("Content-Transfer-Encoding: binary");


readfile($filepath);
 exit;
?>