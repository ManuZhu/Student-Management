<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生管理系统</title>
</head>
<body>
    <?php
        include('../inc/sql.php');
        $no = $_POST['no'];
        $sql_select_a = "select * from student where Sno='$no'";
        $stmt_a = mysqli_query($conn, $sql_select_a);
        $stu_a = mysqli_fetch_assoc($stmt_a);
    ?>
<body>
    <td><a href='../index.php'>浏览学生信息</a> <a href='../course.php'>浏览课程信息</a> <a href='../grade.php'>浏览成绩信息</a> <a href='../add/add_student.php'>添加学生</a> <a href='../opt/count.php'>学生信息统计</a></td>
</body>
<h3>学生基本信息</h3>
    <table width="1000" border="1" cellspacing="0">
        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>系别</th>
            <th>是否获得奖学金</th>
        </tr>
        <?php
            echo "<tr>";
            echo "<th>{$stu_a['Sno']}</th>";
            echo "<th>{$stu_a['Sname']}</th>";
            echo "<th>{$stu_a['Ssex']}</th>";
            echo "<th>{$stu_a['Sage']}</th>";
            echo "<th>{$stu_a['Sdept']}</th>";
            echo "<th>{$stu_a['Scholarship']}</th>";
            echo "</tr>";
        ?>
    </table>
<h3>学生选课信息</h3>
    <table width="1000" border="1" cellspacing="0">
        <tr>
            <th>课程号</th>
            <th>成绩</th>
        </tr>
        <?php
            include('../inc/sql.php');
            $no = $_POST['no'];
            $sql_select = "select * from sc where Sno='$no'";
            foreach($conn->query($sql_select) as $row){
                echo "<tr>";
                echo "<th>{$row['Cno']}</th>";
                echo "<th>{$row['Grade']}</th>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>