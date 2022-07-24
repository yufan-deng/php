<?php
header("Content-Type: text/html; CHARSET=GBK");
$comname=iconv('UTF-8','GBK',$_GET["comname"]);
$username=iconv('UTF-8','GBK',$_GET["username"]);
$password=$_GET["password"];
$result="fail";

$servern="localhost";
$coninfo=array("Database"=>"ysc","UID"=>"sa","PWD"=>"2002ivanDENG");
$conn=sqlsrv_connect($servern,$coninfo);
$sql="Select companyid, custdefine, venderdefine, materdefine
      from userright
      where ostrc = '$comname' and staffname = '$username' and password = '$password'";
$val=sqlsrv_query($conn,$sql);
if($row=sqlsrv_fetch_array($val)){
  $result["companyid"] = $row["companyid"];
  $result["custdefine"] = $row["custdefine"];
  $result["venderdefine"] = $row["venderdefine"];
  $result["materdefine"] = $row["materdefine"];
}
echo $result;
sqlsrv_close($conn);
?>
