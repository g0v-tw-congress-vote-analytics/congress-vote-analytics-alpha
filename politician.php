<!DOCTYPE html>
<html>
 <head>
  <title>立委個人頁</title>
 </head>
 <body>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$userid = $_SESSION['userid'] ;
$username = $_SESSION['username'] ;
$pid = $_GET['pid'];
$pname = $_GET['pname']; 
echo '<h2>歡迎回來'.
		$username .
		'</h2>';
if($_SESSION['username'] != null)
{
        //echo '<a href="register.php">新增</a>    ';
        echo '<a href="update.php">修改</a> ';
		echo '<a href="logout.php">登出</a> ';
		echo '<a href="member.php">會員列表</a> ';
		echo '<a href="commom.php">留言板</a> ';
		echo '<a href="politician_list.php">立委列表</a> ';
		
		echo "<h3>立委個人頁： $pname 委員</h3>";
		
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>


<p>此一立委針對各議題的立場。</p>
<table>
    <tr><td>序號</td><td>議題名稱(點選連結進入議題內頁)</td><td>立委立場</td><td>重視程度</td></tr>

<?php
if($username != null)
{
		$ser =1;
        //將資料庫裡的所有留言資料顯示在畫面上
        $sql2 = "SELECT issue.id, issue.name, ivsp.vote, ivsp.scale,ivsp.vote * ivsp.scale as cont
				FROM  `issue` LEFT JOIN  `ivsp` ON issue.id = ivsp.isid
				AND ivsp.pid = $pid order by cont desc";
        $result2 = mysql_query($sql2);
        while($row = mysql_fetch_row($result2))
        {
				
				echo "<tr><td>$ser</td><td><a href='issue_content2.php?pid=$pid&id=$row[0]&pname=$pname'>$row[1]</a>  </td>";
				$ser++;
				if($row[2] == null){
					echo "<td>尚未表態</td><td></td></tr>";				
				}else{
					if($row[2] == 1){
						echo "<td>支持</td><td>$row[3]</td></tr>";
					}else{
						echo "<td>反對</td><td>$row[3]</td></tr>";
					}
				
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
>>>>>>> f0ac18af82cfd1e5b4ae737934fea7fa07a45f42
</html>