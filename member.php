<!DOCTYPE html>
<html>
 <head>
  <title>首頁</title>
 </head>
 <body>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$username = $_SESSION['username'] ;
echo '<h2>歡迎回來'.
		$username .
		'</h2>';

//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['username'] != null)
{
        //echo '<a href="register.php">新增</a>    ';
        echo '<a href="update.php">修改</a> ';
		echo '<a href="logout.php">登出</a> ';
		echo '<a href="issue.php">議題表態</a> ';
		echo '<a href="commom.php">留言板</a> ';
		echo '<a href="politician_list.php">立委列表</a> ';
      //  echo '<a href="delete.php">刪除</a>  <br><br>';
    
        //將資料庫裡的所有會員資料顯示在畫面上
        $sql = "SELECT * FROM member_table";
        $result = mysql_query($sql);
        echo '<h2>會員列表</h2>';
	   while($row = mysql_fetch_row($result))
        {
               if($username ==$row[1]){
					echo "$row[0] - 名字(帳號)：$row[1], " . 
                 "電話：$row[3], 地址：$row[4], 備註：$row[5]<br>";
			   }else{
					echo "$row[0] - 名字(帳號)：$row[1], " .
					"備註：$row[5]<br>";
			   }
			   
				
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