<?php
$servern="localhost";
$coninfo=array("Database"=>"ysc","UID"=>"sa","PWD"=>"2002ivanDENG");
$conn=sqlsrv_connect($servern,$coninfo);


$sql="EXEC [dbo].[p_appbasicedit] 'd_provide', '*供应商名称=''亚太'',*供应商编号=''P0000'',拿货说明='''',供应商联系人='''',供应商电话='''',供应商传真='''',QQ='''',合作方式='''''";
echo($sql);
$val=sqlsrv_query($conn,$sql);

sqlsrv_close($conn);
?>
