<!DOCTYPE html>
<html>
 <head>
  <title>議題內頁</title>
 </head>
 <body>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$issueid = $_GET['id'];   //將get過來的變數值接過來給$id變數
$pid = $_GET['pid']; 
$pname = $_GET['pname']; 
$username = $_SESSION['username'] ;
$userid = $_SESSION['userid'] ;
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
        echo '<a href="issue.php">議題列表</a> ';
        echo '<a href="politician_list.php">立委列表</a> ';
        echo '<h3>立委議題表態</h3><br/>';
        //將資料庫裡的所有留言資料顯示在畫面上
        $sql1 = "SELECT vote, scale FROM  `ivsp` where isid = '$issueid' and pid = '$pid' ";
        $sql2 = "SELECT id, name FROM  `issue` where id = '$issueid'  ";
        $result1 = mysql_query($sql1);
        $result2 = mysql_query($sql2);
        $row = mysql_fetch_row($result1);
        $row2 = mysql_fetch_row($result2);
        
        echo "$pname 針對議題： $row2[1] 的表態";
            if($row[0]==null){
                echo "<form name=\"form\" method=\"post\" action=\"insert_issue.php?action=ins_ivsp&pid=$pid\">";
            }else{
                echo "<form name=\"form\" method=\"post\" action=\"insert_issue.php?action=upd_ivsp&pid=$pid\">";
            }
        
            echo "<input type=\"hidden\" name=\"issueid\" value=\"$issueid\" /> ";
            if($row[0]==1){
                echo "立場：<input type=\"radio\" name=\"vote\" value=\"1\" checked>同意</input>";
                echo "<input type=\"radio\" name=\"vote\" value=\"-1\">反對</input>  <br>";
            }else if($row[0]==-1){
                echo "立場：<input type=\"radio\" name=\"vote\" value=\"1\">同意</input>";
                echo "<input type=\"radio\" name=\"vote\" value=\"-1\" checked>反對</input><br>";
            }else{
                echo "立場：<input type=\"radio\" name=\"vote\" value=\"1\">同意</input>";
                echo "<input type=\"radio\" name=\"vote\" value=\"-1\">反對</input><br>";
            }
       
        
        
        echo "重要性：<input type=\"text\" name=\"scale\" value=\"$row[1]\" />(請輸入1~100的數值) <br>";

        echo "<input type=\"submit\" name=\"button\" value=\"確定\" /><br>";
        echo "</form>";
        
        //立委立場排序
        $sql3 = "SELECT p.name , i.vote , vote*scale as cont,p.id
                FROM  `politician` as p left join `ivsp` as i
                on p.id = i.pid and i.isid ='$issueid' order by cont desc";
        $result3 = mysql_query($sql3);
        echo '<br><h3>立委立場：</h3>';
        echo "<p>各個立委針對此一議題的立場。</p>
        <table><tr><td>序號</td><td>立委姓名</td><td>立場</td><td>立場指數</td></tr>";
        $ser =1;
        while($row3 = mysql_fetch_row($result3))
        {
            if($row3 == null){
                echo "<tr><td>$ser</td><td>本議題尚未有立場資料</td><td></td><td></td></tr>";
            }else{
                echo "<tr><td>$ser</td><td><a href='politician.php?pid=$row3[3]&pname=$row3[0]'>$row3[0]</a></td>";
                $ser++;
                if($row3[1] == 1){
                    echo "<td>支持</td><td>$row3[2]</td></tr>";
                }else if($row3[1] == -1){
                    echo "<td>反對</td><td>$row3[2]</td></tr>";
                }else if($row3[1] == null){
                    echo "<td>尚未表態</td><td>0</td></tr>";
                }
            }           
            
        }
        echo "</table>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
 </body>
</html>