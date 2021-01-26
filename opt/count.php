<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生信息管理</title>
</head>
<body>
<h3>学生信息统计</h3>
<body>
    <td><a href='../index.php'>浏览学生信息</a> <a href='../course.php'>浏览课程信息</a> <a href='../grade.php'>浏览成绩信息</a> <a href='../add/add_student.php'>添加学生</a> <a href='../opt/count.php'>学生信息统计</a></td>
</body>
    <table width="1000" border="1" cellspacing="0">
        <tr>
            <th>系别</th>
            <th>平均成绩</th>
            <th>最好成绩</th>
            <th>最差成绩</th>
            <th>优秀率</th>
            <th>不及格人数</th>
        </tr>
        <?php
            include('../inc/sql.php');
            $sql_select = "select Sdept,avg(Grade) as avg,max(Grade) as mx,min(Grade) as mn,(count(if(Grade>=90,true,null)))/(count(Grade)) as A,count(if(Grade<60,true,null)) as B from student natural left join sc group by Sdept";
            foreach($conn->query($sql_select) as $row){
                echo "<tr>";
                echo "<th>{$row['Sdept']}</th>";

                if($row['avg']!='') echo "<th>{$row['avg']}</th>";
                else echo "<th>NULL</th>";

                if($row['mx']!='') echo "<th>{$row['mx']}</th>";
                else echo "<th>NULL</th>";

                if($row['mn']!='') echo "<th>{$row['mn']}</th>";
                else echo "<th>NULL</th>";

                if($row['A']!='') echo "<th>{$row['A']}</th>";
                else echo "<th>NULL</th>";
                
                echo "<th>{$row['B']}</th>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>