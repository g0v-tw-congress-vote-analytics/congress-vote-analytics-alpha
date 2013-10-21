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
$action = $_GET['action']; 

if($id != null )
{
        //新增資料進資料庫語法
        if($action=='insert'){
            $memo = $_POST['memo']; 
            $sql = "insert into issue (name) values ('$memo')";
        }else{
            $vote = $_POST['vote'];$scale = $_POST['scale'];$isid = $_POST['issueid']; 
            if($action=='ins_ivsm'){
                $sql = "insert into ivsm (mid ,isid ,vote ,scale) values ('$id','$isid','$vote','$scale')";
            }else if($action=='upd_ivsm'){
                $sql = "update  ivsm set  vote = '$vote' , scale = '$scale' where mid = '$id' and isid = '$isid'";
            }else if($action=='ins_ivsp'){
                $pid = $_GET['pid']; 
                $pname = $_GET['pname']; 
                $sql = "insert into ivsp (pid ,isid ,vote ,scale) values ('$pid','$isid','$vote','$scale')";
            }else if($action=='upd_ivsp'){
                $pid = $_GET['pid']; 
                $pname = $_GET['pname']; 
                $sql = "update  ivsp set  vote = '$vote' , scale = '$scale' where pid = '$pid' and isid = '$isid'";
            }
        }
        
        
        if(mysql_query($sql))
        {
                echo '新增成功!';
                if($action=='ins_ivsm'){
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=issue.php>';
                }else if($action=='upd_ivsm'){
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=issue.php>';
                }else if($action=='ins_ivsp'){
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=politician_list.php >';
                }else if($action=='upd_ivsp'){
                    echo '<meta http-equiv=REFRESH CONTENT=2;url=politician_list.php >';
                }
                
        }
        else
        {
                echo '新增失敗!';
                echo mysql_error();
                echo '<meta http-equiv=REFRESH CONTENT=2;url=issue.php>';
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