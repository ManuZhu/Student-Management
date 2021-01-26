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
        $sql_select = "select * from student where sno='$id'";
        $stmt = mysqli_query($conn,$sql_select);
        $stu = mysqli_fetch_assoc($stmt);
    ?>
<h3>修改学生信息</h3>
<body>
    <td><a href='../index.php'>浏览学生信息</a> <a href='../course.php'>浏览课程信息</a> <a href='../grade.php'>浏览成绩信息</a> <a href='../add/add_student.php'>添加学生</a> <a href='../opt/count.php'>学生信息统计</a></td>
</body>
    <form action="../action.php?action=edit_student" method="post">
        <input type="hidden" name="no" value="<?php echo $stu['Sno'];?>">
        <table>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name" value="<?php echo $stu['Sname'];?>"></td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="age" value="<?php echo $stu['Sage'];?>"></td>
            </tr>
            <tr>
                <td>性别</td>
                <td>
                    <input type="radio" name="sex" value="男" <?php echo ($stu['Ssex'] == "男")? "checked":"";?> >男
                </td>
                <td>
                    <input type="radio" name="sex" value="女" <?php echo ($stu['Ssex'] == "女")? "checked":"";?> >女
                </td>
            </tr>
            <tr>
                <td>系别</td>
                <td><input type="text" name="dept" value="<?php echo $stu['Sdept']?>"></td>
            </tr>
            <tr>
                <td>是否获得奖学金</td>
                <td>
                    <input type="radio" name="scholarship" value="是" <?php echo ($stu['Scholarship'] == "是")? "checked":"";?> >是
                </td>
                <td>
                    <input type="radio" name="scholarship" value="否" <?php echo ($stu['Scholarship'] == "否")? "checked":"";?> >否
                </td>
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