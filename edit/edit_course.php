<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生管理系统</title>
</head>
<body>
    <?php
        include('../inc/sql.php');
        $id = $_GET['id'];
        $sql_select = "select * from course where cno='$id'";
        $stmt = mysqli_query($conn, $sql_select);
        $stu = mysqli_fetch_assoc($stmt);
    ?>
<h3>修改课程信息</h3>
<body>
    <td><a href='../index.php'>浏览学生信息</a> <a href='../course.php'>浏览课程信息</a> <a href='../grade.php'>浏览成绩信息</a> <a href='../add/add_student.php'>添加学生</a> <a href='../opt/count.php'>学生信息统计</a></td>
</body>
    <form action="../action.php?action=edit_course" method="post">
        <input type="hidden" name="no" value="<?php echo $stu['Cno'];?>">
        <table>
            <tr>
                <td>课程名</td>
                <td><input type="text" name="name" value="<?php echo $stu['Cname'];?>"></td>
            </tr>
            <tr>
                <td>先修课程号</td>
                <td><input type="text" name="pno" value="<?php echo $stu['Cpno'];?>"></td>
            </tr>
            <tr>
                <td>学分</td>
                <td><input type="text" name="credit" value="<?php echo $stu['Ccredit']?>"></td>
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