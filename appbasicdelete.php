<?php
$table=$_GET["table"];
$field=$_GET["field"];
$id=iconv('UTF-8','GBK',$_GET["id"]);

$servern="localhost";
$coninfo=array("Database"=>"ysc","UID"=>"sa","PWD"=>"2002ivanDENG");
$conn=sqlsrv_connect($servern,$coninfo);

$sql="delete from $table where $field = '$id'";
$val=sqlsrv_query($conn,$sql);

sqlsrv_close($conn);
?>
