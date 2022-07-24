<?php
header("Content-Type: text/html; CHARSET=GBK");
$username=iconv('UTF-8','GBK',$_GET["username"]);
$password=$_GET["password"];
$result="fail";

$servern="localhost";
$coninfo=array("Database"=>"ysc","UID"=>"sa","PWD"=>"2002ivanDENG");
$conn=sqlsrv_connect($servern,$coninfo);
$sql="select [staffname],[password],rpt_42
      from [ysc].[dbo].[userright]";
$val=sqlsrv_query($conn,$sql);
while($row=sqlsrv_fetch_array($val)){
    if($row["staffname"]==$username){
      if($row["password"]==$password){
        $result="found";
        if($row["rpt_42"]>1){
          $result="success";
        }
      }
    }
}
echo $result;
sqlsrv_close($conn);
?>
