<html>
 <head>
  <title>首頁</title>
 </head>
 <body>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$telephone = $_POST['telephone'];
$address = $_POST['address'];
$other = $_POST['other'];
$email = $_POST['email'];
//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
 echo $other ;
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        //新增資料進資料庫語法
        $sql = "insert into member_table (username, password, telephone, address, other,email) values ('$id', '$pw', '$telephone', '$address', '$other','$email')";
        if(mysql_query($sql))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '新增失敗!';
				echo mysql_error();
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
}
else
{
        echo '您無權限觀看此頁面!';
		
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
		
}
?>
 </body>
</html>