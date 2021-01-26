<?php
    include('inc/sql.php');
    if($conn){
        switch($_GET['action']){
            case 'add_student':
                $no = $_POST['no'];
                $name = $_POST['name'];
                $sex = $_POST['sex'];
                $age = $_POST['age'];
                $dept = $_POST['dept'];
                $scholarship = $_POST['scholarship'];

                $sql = "insert into student (sno, sname, ssex, sage, sdept, scholarship) values ('$no', '$name', '$sex', $age, '$dept', '$scholarship')";
                $rw = mysqli_query($conn,$sql);

                if($rw > 0) echo "<script>alert('添加成功');</script>";
                else{
                    echo("错误描述: " . mysqli_error($conn));
                    echo "<script>alert('添加失败');</script>";
                }
                break;

            case 'add_course':
                $no = $_POST['no'];
                $name = $_POST['name'];
                $pno = $_POST['pno'];
                $credit = $_POST['credit'];

                if($pno=='') $sql = "insert into course (cno, cname, cpno, ccredit) values ('$no', '$name', NULL, $credit)";
                else $sql = "insert into course (cno, cname, cpno, ccredit) values ('$no', '$name', '$pno', $credit)";
                $rw = mysqli_query($conn,$sql);

                if($rw > 0) echo "<script>alert('添加成功');</script>";
                else{
                    echo("错误描述: " . mysqli_error($conn));
                    echo "<script>alert('添加失败');</script>";
                }
                break;

            case 'add_grade':
                $sno = $_POST['sno'];
                $cno = $_POST['cno'];
                $grade = $_POST['grade'];

                $sql = "insert into sc (sno, cno, grade) values ('$sno', '$cno', $grade)";
                $rw = mysqli_query($conn,$sql);

                if($rw > 0) echo "<script>alert('添加成功');</script>";
                else{
                    echo("错误描述: " . mysqli_error($conn));
                    echo "<script>alert('添加失败');</script>";
                }
                break;

            case 'edit_student':
                $no = $_POST['no'];
                $name = $_POST['name'];
                $age = $_POST['age'];
                $sex = $_POST['sex'];
                $dept = $_POST['dept'];
                $scholarship = $_POST['scholarship'];

                $sql = "update student set Sname='$name',Sage=$age,Ssex='$sex',Sdept='$dept',Scholarship='$scholarship' where Sno='$no'";
                $rw = mysqli_query($conn,$sql);

                if($rw > 0) echo "<script>alert('更新成功');</script>";
                else{
                    echo("错误描述: " . mysqli_error($conn));
                    echo "<script>alert('更新失败');</script>";
                }
                break;

            case 'edit_course':
                $no = $_POST['no'];
                $name = $_POST['name'];
                $pno = $_POST['pno'];
                $credit = $_POST['credit'];

                $sql = "update course set Cname='$name',Cpno='$pno',Ccredit=$credit where Cno='$no'";
                $rw = mysqli_query($conn,$sql);

                if($rw > 0) echo "<script>alert('更新成功');</script>";
                else{
                    echo("错误描述: " . mysqli_error($conn));
                    echo "<script>alert('更新失败');</script>";
                }
                break;

            case 'edit_grade':
                $sno = $_POST['sno'];
                $cno = $_POST['cno'];
                $grade = $_POST['grade'];

                $sql = "update sc set Grade=$grade where Sno='$sno' and Cno='$cno'";
                $rw = mysqli_query($conn,$sql);

                if($rw > 0) echo "<script>alert('更新成功');</script>";
                else{
                    echo("错误描述: " . mysqli_error($conn));
                    echo "<script>alert('更新失败');</script>";
                }
                break;

            case 'del_student':
                $sno = $_GET['id'];
                $sql = "delete from student where Sno=$sno";
                $rw = mysqli_query($conn,$sql);

                if($rw > 0) echo "<script>alert('删除成功');</script>";
                else{
                    echo("错误描述: " . mysqli_error($conn));
                    echo "<script>alert('删除失败');</script>";
                }
                break;

            case 'del_course':
                $cno = $_GET['id'];
                $sql = "delete from course where Cno='$cno'";
                $rw = mysqli_query($conn,$sql);

                if($rw > 0) echo "<script>alert('删除成功');</script>";
                else{
                    echo("错误描述: " . mysqli_error($conn));
                    echo "<script>alert('删除失败');</script>";
                }
                break;

            case 'del_grade':
                $sno = $_GET['sno'];
                $cno = $_GET['cno'];
                $sql = "delete from sc where Sno='$sno' and Cno='$cno'";
                $rw = mysqli_query($conn,$sql);

                if($rw > 0) echo "<script>alert('删除成功');</script>";
                else{
                    echo("错误描述: " . mysqli_error($conn));
                    echo "<script>alert('删除失败');</script>";
                }
                break;
        }
        mysqli_close($conn);
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生管理系统</title>
</head>
<body>
<td><a href="index.php">返回</td>
</body>
</html>