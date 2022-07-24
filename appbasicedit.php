<?php
$tablename=$_GET["tablename"];
$fieldstr=iconv('UTF-8','GBK',$_GET["fieldstr"]);

$servern="localhost";
$coninfo=array("Database"=>"ysc","UID"=>"sa","PWD"=>"2002ivanDENG");
$conn=sqlsrv_connect($servern,$coninfo);

$sql="EXEC [dbo].[p_appbasicedit] '$tablename', '$fieldstr'";
$val=sqlsrv_query($conn,$sql);

sqlsrv_close($conn);
?>
