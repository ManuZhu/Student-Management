<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生管理系统</title>
</head>
<body>
    <?php
        include('../inc/sql.php');
        $sno = $_GET['sno'];
        $cno = $_GET['cno'];
        $sql_select = "select * from sc where Sno='$sno' and Cno='$cno'";
        $stmt = mysqli_query($conn, $sql_select);
        $stu = mysqli_fetch_assoc($stmt);
    ?>
<h3>修改学生成绩</h3>
<body>
    <td><a href='../index.php'>浏览学生信息</a> <a href='../course.php'>浏览课程信息</a> <a href='../grade.php'>浏览成绩信息</a> <a href='../add/add_student.php'>添加学生</a> <a href='../opt/count.php'>学生信息统计</a></td>
</body>
    <form action="../action.php?action=edit_grade" method="post">
        <input type="hidden" name="sno" value="<?php echo $stu['Sno'];?>">
        <input type="hidden" name="cno" value="<?php echo $stu['Cno'];?>">
        <table>
            <tr>
                <td>成绩</td>
                <td><input type="text" name="grade" value="<?php echo $stu['Grade'];?>"></td>
            </tr>
            <tr>
                <td> </td>
                <td><input type="submit" value="修改"></td>
                <td><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
</body>
</html>