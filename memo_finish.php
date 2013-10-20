<html>
 <head>
  <title>首頁</title>
 </head>
 <body>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$id = $_SESSION['userid'];
$memo = $_POST['memo'];


if($id != null )
{
        //新增資料進資料庫語法
        $sql = "insert into memo (userid, memo) values ('$id', '$memo')";
        if(mysql_query($sql))
        {
                echo '留言成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=commom.php>';
        }
        else
        {
                echo '留言失敗!';
				echo mysql_error();
                echo '<meta http-equiv=REFRESH CONTENT=2;url=commom.php>';
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