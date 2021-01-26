<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生管理系统</title>
</head>
<body>
<h3>添加新学生</h3>
    <form action="../action.php?action=add_student" method="post">
        <table>
            <tr>
                <td>学号</td>
                <td><input type="text" name="no"></td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>性别</td>
                <td><input type="radio" name="sex" value="男">男</td>
                <td><input type="radio" name="sex" value="女">女</td>
            </tr>
            <tr>
                <td>年龄</td>
                <td><input type="text" name="age"></td>
            </tr>
            <tr>
                <td>系别</td>
                <td><input type="text" name="dept"></td>
            </tr>
            <tr>
                <td>是否获得奖学金</td>
                <td><input type="radio" name="scholarship" value="是">是</td>
                <td><input type="radio" name="scholarship" value="否">否</td>
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