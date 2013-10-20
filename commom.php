<!DOCTYPE html>
<html>
 <head>
  <title>留言板</title>
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
if($_SESSION['username'] != null)
{
        //echo '<a href="register.php">新增</a>    ';
        echo '<a href="update.php">修改</a> ';
		echo '<a href="logout.php">登出</a> ';
		echo '<a href="issue.php">議題表態</a> ';
		echo '<a href="member.php">會員列表</a> ';
		echo '<a href="politician_list.php">立委列表</a> ';
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
<h2>留言板</h2>
<form name="form" method="post" action="memo_finish.php">
留言
<textarea name="memo" cols="45" rows="5"></textarea> <input type="submit" name="button" value="確定" />
</form>
<br/>
<table>
    <tr><td>序號</td><td>留言人</td><td>內容</td><td>時間</td></tr>

<?php
if($_SESSION['username'] != null)
{
    
        //將資料庫裡的所有留言資料顯示在畫面上
        $sql2 = "SELECT o.id, m.username, o.memo, o.time FROM  `member_table` AS m JOIN  `memo` AS o WHERE m.no = o.userid order by o.id desc";
        $result2 = mysql_query($sql2);
        while($row = mysql_fetch_row($result2))
        {
				
				if($username ==$row[1]){
					echo "<tr><td>$row[0] </td><td>$row[1] (本人)</td><td>$row[2]</td><td>$row[3]</td></tr>";
				}else{
					echo "<tr><td>$row[0] </td><td>$row[1] </td><td>$row[2]</td><td>$row[3]</td></tr>";
				}
        }
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
</table>

 </body>
</html>