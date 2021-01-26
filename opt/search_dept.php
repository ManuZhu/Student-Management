<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生管理系统</title>
</head>
<body>
<body>
    <td><a href='../index.php'>浏览学生信息</a> <a href='../course.php'>浏览课程信息</a> <a href='../grade.php'>浏览成绩信息</a> <a href='../add/add_student.php'>添加学生</a> <a href='../opt/count.php'>学生信息统计</a></td>
</body>
<h3>排名</h3>
    <table width="1000" border="1" cellspacing="0">
        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>系别</th>
            <th>是否获得奖学金</th>
            <th>课程号</th>
            <th>成绩</th>
        </tr>
        <?php
            include('../inc/sql.php');
            $dept = $_POST['dept'];
            $sql_select = "select * from (select * from student natural join sc where Sdept='$dept')a order by Grade desc";
            foreach($conn->query($sql_select) as $row){
                echo "<tr>";
                echo "<th>{$row['Sno']}</th>";
                echo "<th>{$row['Sname']}</th>";
                echo "<th>{$row['Ssex']}</th>";
                echo "<th>{$row['Sage']}</th>";
                echo "<th>{$row['Sdept']}</th>";
                echo "<th>{$row['Scholarship']}</th>";
                echo "<th>{$row['Cno']}</th>";
                echo "<th>{$row['Grade']}</th>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>