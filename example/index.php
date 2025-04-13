<?php
/**
 * create filesizer static object
 * use object to find size of file in bits/bytes/kb,mb,gb,etc
 * use object to convert filesize to another size
 */

 require_once "/path/to/FileSizer.php";

 $fileSize = FileSizer::getFileSize("file.txt","K");

 var_dump($fileSize);

 echo "<hr />";

 echo "<p>".number_format($fileSize['size'],2)." ".$fileSize['longunit']."</p>";

