<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生管理系统</title>
</head>

<body>
<h3>添加新课程</h3>
    <form action="../action.php?action=add_course" method="post">
        <table>
            <tr>
                <td>课程号</td>
                <td><input type="text" name="no"></td>
            </tr>
            <tr>
                <td>课程名</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>先修课程号</td>
                <td><input type="text" name="pno"></td>
            </tr>
            <tr>
                <td>学分</td>
                <td><input type="text" name="credit"></td>
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