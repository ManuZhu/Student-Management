<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
    <script>
        function doDel(id) {
            if(confirm('确认删除?')) {
                window.location='action.php?action=del_course&id='+id;
            }
        }
    </script>
</head>
<body>
<h3>浏览课程信息</h3>
    <?php
        include('menu/menuc.php');
    ?>
    <table width="1000" border="1" cellspacing="0">
        <tr>
            <th>课程号</th>
            <th>课程名</th>
            <th>先修课程号</th>
            <th>学分</th>
            <th>操作</th>
        </tr>
        <?php
            include('inc/sql.php');
            $sql_select = "select * from course";
            foreach($conn->query($sql_select) as $row){
                if($row['Cpno'] == "") $Cpno = "NULL";
                else $Cpno = $row['Cpno'];
                if(!is_numeric($row['Ccredit'])) $Ccredit = "NULL";
                else $Ccredit = $row['Ccredit'];
                echo "<tr>";
                echo "<th>{$row['Cno']}</th>";
                echo "<th>{$row['Cname']}</th>";
                echo "<th>{$Cpno}</th>";
                echo "<th>{$Ccredit}</th>";
                echo "<td><a href='edit/edit_course.php?id={$row["Cno"]}'>修改</a> <a href='javascript:void(0);' onclick='doDel({$row["Cno"]})'>删除</a></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>