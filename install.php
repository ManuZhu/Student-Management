<?php
include_once 'inc/config.inc.php';
$dbhost=DBHOST;
$dbuser=DBUSER;
$dbpw=DBPW;
$dbname=DBNAME;
$mes_connect='';
$mes_create='';
$mes_data='';
$mes_ok='';

if(isset($_POST['submit'])){
    //判断数据库连接
    if(!@mysqli_connect($dbhost, $dbuser, $dbpw)){
        exit('数据连接失败，请仔细检查inc/config.inc.php的配置');
    }
    $link=mysqli_connect(DBHOST, DBUSER, DBPW);
    $mes_connect.="<p class='notice'>数据库连接成功!</p>";
    //如果存在,则直接干掉
    $drop_db="drop database if exists $dbname";
    if(!@mysqli_query($link, $drop_db)){
        exit('初始化数据库失败，请仔细检查当前用户是否有操作权限');
    }
    //创建数据库
    $create_db="CREATE DATABASE $dbname";
    if(!@mysqli_query($link,$create_db)){
        exit('数据库创建失败，请仔细检查当前用户是否有操作权限');
    }
    $mes_create="<p class='notice'>新建数据库:".$dbname."成功!</p>";
    //创建数据.选择数据库
    if(!@mysqli_select_db($link, $dbname)){
        exit('数据库选择失败，请仔细检查当前用户是否有操作权限');
    }

    //创建学生表
    $creat_student=
        "CREATE TABLE `Student` (
    `Sno` CHAR(9) PRIMARY KEY,
    `Sname` CHAR(20) UNIQUE,
    `Ssex` char(2),
    `Sage` SMALLINT,
    `Sdept` char(20),
    `Scholarship` char(2)
    )";
    if(!@mysqli_query($link,$creat_student)){
        echo mysqli_error($link);
        exit('创建Student表失败，请仔细检查当前用户是否有操作权限');
    }

    //往学生表里面插入默认的数据
    $insert_students = "insert into `Student` values ('200215121','李勇','男',20,'CS','否'),('200215122','刘晨','女',19,'CS','否'),('200215123','王敏','女',18,'MA','否'),('200215125','张立','男',19,'IS','否')";

    if(!@mysqli_query($link,$insert_students)){
        echo $link->error;
        exit('创建Student表失败，请仔细检查当前用户是否有操作权限');
    }

    //创建课程表
    $create_course=
        "CREATE TABLE IF NOT EXISTS `Course` (
    `Cno` CHAR(4) PRIMARY KEY,
    `Cname` CHAR(40),
    `Cpno` CHAR(4),
    `Ccredit` SMALLINT,
     FOREIGN KEY (`Cpno`) REFERENCES Course(`Cno`)
    )";
    if(!@mysqli_query($link,$create_course)){
        exit('创建Course表失败，请仔细检查当前用户是否有操作权限');
    }

    $insert_courses = "insert into `Course` values ('1', '数据库', 5 ,4),('2', '数学', NULL,2),('3', '信息系统', 1,4),('4', '操作系统', 6,3),('5', '数据结构', 7,4),('6', '数据处理', NULL, 2),('7', 'java', 6,4)";

    if(!@mysqli_query($link,$insert_courses)){
        echo $link->error;
        exit('创建Course表数据失败，请仔细检查当前用户是否有操作权限');
    }

    $create_SC=
        "CREATE TABLE `SC` (
    `Sno` CHAR(9),
    `Cno` CHAR(4),
    `Grade` SMALLINT,
    primary key (`Sno`, `Cno`),
    FOREIGN KEY (`Sno`) REFERENCES Student(`Sno`),
    FOREIGN KEY (`Cno`) REFERENCES Course(`Cno`)
    )";

    if(!@mysqli_query($link,$create_SC)){
        exit('创建SC表失败，请仔细检查当前用户是否有操作权限');
    }

    $insert_SC = "insert into `SC` values ('200215121', '1',92),('200215121', '2',85),('200215121', '3',88),('200215122', '2',90),('200215122', '3',80)";

    if(!@mysqli_query($link,$insert_SC)){
        echo $link->error;
        exit('创建SC表数据失败，请仔细检查当前用户是否有操作权限');
    }

    $mes_data="<p class='notice'>创建数据库数据成功!</p>";
    $mes_ok="<p class='notice'>好了，可以开搞了～<a href='index.php'>点击这里</a>进入首页</p>";
}
?>


<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
<!--                <li>-->
<!--                    <i class="ace-icon fa fa-home home-icon"></i>-->
<!--                    <a href="#">Home</a>-->
<!--                </li>-->
                <li class="active">系统初始化安装</li>
            </ul><!-- /.breadcrumb -->

        </div>
<div class="page-content">

    <div id=install_main>
        <p class="main_title">Setup guide:</p>
        <p class="main_title">第0步：请提前安装“mysql+php+中间件”的环境;</p>
        <p class="main_title">第1步：请根据实际环境修改inc/config.inc.php文件里面的参数;</p>
        <p class="main_title">第2步：点击“安装/初始化”按钮;</p>
        <form method="post">
            <input type="submit" name="submit" value="安装/初始化"/>
        </form>

    </div>
    <div class="info" style="color: #D6487E;padding-top: 40px;">
        <?php
        echo $mes_connect;
        echo $mes_create;
        echo $mes_data;
        echo $mes_ok;
        ?>

    </div>

</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->