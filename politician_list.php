<!DOCTYPE html>
<html>
 <head>
  <title>立委列表</title>
 </head>
 <body>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$userid = $_SESSION['userid'] ;
$username = $_SESSION['username'] ;
echo '<h2>歡迎回來'.
		$username .
		'</h2>';
if($_SESSION['username'] != null)
{
        //echo '<a href="register.php">新增</a>    ';
        echo '<a href="update.php">修改</a> ';
		echo '<a href="logout.php">登出</a> ';
		echo '<a href="member.php">會員列表</a> ';
		echo '<a href="issue.php">議題列表</a> ';
		echo '<a href="commom.php">留言板</a> ';
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>

<h3>立委列表</h3>
<p>考慮各個議題您的立場與立委的立場，以及經過您針對議題的重視程度加權，最終所作的綜合排序。</p>
<table>
    <tr><td>序號</td><td>立委名稱</td><td>加權排序</td></tr>

<?php
if($_SESSION['username'] != null)
{
    
        //將資料庫裡的所有留言資料顯示在畫面上
        $sql2 = "SELECT ip.pid, po.name, SUM( ip.vote * im.vote * im.scale ) AS cont
					FROM  `ivsp` AS ip,  `ivsm` AS im,  `politician` AS po
					WHERE ip.pid = po.id
					AND ip.isid = im.isid
					AND im.mid =$userid
					GROUP BY ip.pid
					ORDER BY cont DESC ";
        $result2 = mysql_query($sql2);
		$ser = 1;
        while($row = mysql_fetch_row($result2))
        {
				
				echo "<tr><td>$ser </td><td><a href='politician.php?pid=$row[0]&pname=$row[1]'>$row[1] </a> </td>";
				echo "<td>$row[2] </td></tr>";
				$ser ++;
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