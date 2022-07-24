<?php
function mb_is_GB2312($string)
{
    return mb_detect_encoding($string, array("ASCII","GB2312")) === 'EUC-CN';//新发现
}
$tablename=$_GET["tablename"];
$servern="localhost";
$coninfo=array("Database"=>"ysc","UID"=>"sa","PWD"=>"2002ivanDENG");
$conn=sqlsrv_connect($servern,$coninfo);

$sql="DECLARE	@return_value int,
          		@fieldstr varchar(5000)

        EXEC	@return_value = [dbo].[p_appbasicfield]
          		@tablename = N'$tablename',
          		@fieldstr = @fieldstr OUTPUT
      SELECT	@fieldstr as N'@fieldstr'";
$val=sqlsrv_query($conn,$sql);

$res=array();
while($row=sqlsrv_fetch_array($val, SQLSRV_FETCH_ASSOC)){
    $resrow=array();
    foreach($row as $key => $value){
      if(mb_is_GB2312($row[$key])){
        $row[$key]=iconv('GBK','UTF-8',$row[$key]);
      }
      $newkey=$key;
      if(mb_is_GB2312($key)){
        $newkey=iconv('GBK','UTF-8',$key);
      }
      $resrow[$newkey]=$row[$key];
    }
    array_push($res,$resrow);
}
echo json_encode($res);
sqlsrv_close($conn);
?>
