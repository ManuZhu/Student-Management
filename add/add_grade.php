<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生管理系统</title>
</head>

<body>
<h3>添加新成绩</h3>
    <form action="../action.php?action=add_grade" method="post">
        <table>
            <tr>
                <td>学号</td>
                <td><input type="text" name="sno"></td>
            </tr>
            <tr>
                <td>课程号</td>
                <td><input type="text" name="cno"></td>
            </tr>
            <tr>
                <td>成绩</td>
                <td><input type="text" name="grade"></td>
            </tr>
            <tr>
                <td><a href="../index.php">返回</td>
                <td><input type="submit" value="添加"></td>
                <td><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
</body>
</html>