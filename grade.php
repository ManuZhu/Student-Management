<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
    <script>
        function doDel(sno, cno) {
            if(confirm('确认删除?')) {
                window.location='action.php?action=del_grade&sno='+sno+'&cno='+cno;
            }
        }
    </script>
</head>
<body>
<h3>浏览课程信息</h3>
    <?php
        include('menu/menug.php');
    ?>
    <table width="1000" border="1" cellspacing="0">
        <tr>
            <th>学号</th>
            <th>课程号</th>
            <th>成绩</th>
            <th>操作</th>
        </tr>
        <?php
            include('inc/sql.php');
            $sql_select = "select * from sc";
            foreach($conn->query($sql_select) as $row){
                echo "<tr>";
                echo "<th>{$row['Sno']}</th>";
                echo "<th>{$row['Cno']}</th>";
                echo "<th>{$row['Grade']}</th>";
                echo "<td><a href='edit/edit_grade.php?sno={$row["Sno"]}&cno={$row["Cno"]}'>修改</a> <a href='javascript:void(0);' onclick='doDel({$row["Sno"]}, {$row["Cno"]})'>删除</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>