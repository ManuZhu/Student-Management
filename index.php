<?php
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
    <script>
        function doDel(id) {
            if(confirm('确认删除?')) {
                window.location="action.php?action=del_student&id="+id;
            }
        }
    </script>
</head>
<body>
<h3>浏览学生信息</h3>
    <?php
        include('menu/menu.php');
        include_once('inc/config.inc.php');
        if(!@mysqli_connect(DBHOST,DBUSER,DBPW,DBNAME)){
            $html.=
                "<p>
                <a href='install.php' style='color:red;'>
                提示:欢迎使用,pikachu还没有初始化，点击进行初始化安装!
                </a>
                </p>";
        }
        echo $html;
    ?>
    <table width="1000" border="1" cellspacing="0">
        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>系别</th>
            <th>是否获得奖学金</th>
            <th>操作</th>
        </tr>
        <?php
            include('inc/sql.php');
            $sql_select = "select * from student";
            foreach($conn->query($sql_select) as $row){
                echo "<tr>";
                echo "<th>{$row['Sno']}</th>";
                echo "<th>{$row['Sname']}</th>";
                echo "<th>{$row['Ssex']}</th>";
                echo "<th>{$row['Sage']}</th>";
                echo "<th>{$row['Sdept']}</th>";
                echo "<th>{$row['Scholarship']}</th>";
                echo "<td><a href='edit/edit_student.php?id={$row["Sno"]}'>修改</a> <a href='javascript:void(0);' onclick='doDel({$row["Sno"]})'>删除</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
<h3>学生相关信息查询</h3>
    <form action="opt/search_student.php" method="post">
        <table>
            <tr>
                <td>请输入学号</td>
                <td><input type="text" name="no"></td>
            </tr>
            <tr>
                <td><input type="submit" value="搜索"></td>
                <td><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
<h3>系成绩排名</h3>
    <form action="opt/search_dept.php" method="post">
        <table>
            <tr>
                <td>请输入系别</td>
                <td><input type="text" name="dept"></td>
            </tr>
            <tr>
                <td><input type="submit" value="排名"></td>
                <td><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
</body>
</html>