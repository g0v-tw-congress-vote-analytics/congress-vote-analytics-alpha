<!DOCTYPE html>
<html>
 <head>
  <title>議題</title>
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
		echo '<a href="commom.php">留言板</a> ';
		echo '<a href="politician_list.php">立委列表</a> ';
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
<h2>議題</h2>
<h3>新增議題</h3>
<form name="form" method="post" action="insert_issue.php?action=insert">

<input type="TXT"  name="memo" /> <input type="submit" name="button" value="確定" />
</form>
<br/>
<h3>議題列表</h3>
<p>針對此議題你的立場排序。</p>
<table>
    <tr><td>序號</td><td>議題名稱(點選連結進入議題內頁)</td><td>你的立場</td><td>重要性</td></tr>

<?php
if($_SESSION['username'] != null)
{
		$ser =1;
        //將資料庫裡的所有留言資料顯示在畫面上
        $sql2 = "SELECT issue.id, issue.name, ivsm.vote, ivsm.scale,ivsm.vote * ivsm.scale as cont
				FROM  `issue` LEFT JOIN  `ivsm` ON issue.id = ivsm.isid
				AND ivsm.mid = $userid order by cont desc";
        $result2 = mysql_query($sql2);
        while($row = mysql_fetch_row($result2))
        {
				
				echo "<tr><td>$ser</td><td><a href='issue_content.php?id=$row[0]'>$row[1]</a>  </td>";
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
</html>