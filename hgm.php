<!DOCTYPE html>
<html lang="zh-CN">
<!--
    合川中学年级名称转义 后端部分
    GitHub https://github.com/SHIERTX/hczx-gread-meaning
    作者 SHIERTX 以 GPLv3 协议授权
-->
    <head>
        <title>合川中学年级名称转义</title>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <style>
            body {
                background-color: #f0f0f0;
            }
            .container {
                width: 60%;
                margin: 5% auto 0;
                padding: 2% 5%;
                border-radius: 10px
            }
            ul {
                padding-left: 20px;
            }
                ul li {
                    line-height: 2.3
                }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>合川中学年级名称转义</h1>
            <div class="form-text">适用于重庆市合川中学校内称呼转转义</div><br>

            <!-- 变量定义区 -->
            <?php 
            $section = $_GET["section"];
            $year =  intval($_GET["year"]);
            $graduating = "2022"; // 记得在暑假时更新年份
            $new_student = "2024";
            $be_in = <<<EOD
            <div class="badge bg-primary">在读</div>
            EOD;
            $not_in = <<<EOD
            <span class="badge bg-secondary">暂未入学</span> 期待你的到来~
            EOD;
            $been_leave = <<<EOD
            <span class="badge bg-warning">已毕业</span> 祝前程似锦~
            EOD;
            
            // 此处定义毕业考试类型和部门
            if ($section == "middle") {
                $exam = "中" ;
                $input_info = "初";
            } elseif ($section == "high") {
                $exam = "高";
                $input_info = $exam;
            } else {$exam = "传参错误" ;$input_info = $exam;}

            // 此处定义在读状态
            if ($year >= $graduating) { // 如果输入年份大于入学
                if ($year <= $new_student){
                    $status = $be_in;
                }
                else $status = $not_in;
            } elseif ($year < $graduating) { 
                $status = $been_leave;
            } else $status = null;

            // 此处定义年级
            if ($year == "2022") {
                $grade = "三";
            } elseif ($year == "2023") {
                $grade = "二";
            } elseif ($year == "2024") {
                $grade = "一";
            } else {
                $grade = null;
            };

            if ($status = $be_in) {
                $gs = <<<EOD
                且是 <span class="badge bg-primary">{$input_info}{$grade}</span> 学生
                EOD;
            } else {
                $gs = null;
            };
            ?>

            <!-- 结束变量定义 -->

            传入信息：<?php 
            echo $input_info;
            echo $year;
            echo ("级");
            ?><br><br>

            <h2><i class="bi bi-ui-radios"></i>解析内容</h2><br>

            <h3><i class="bi bi-award"></i>毕业考试</h3>
            这表示此年级于 <span class="badge bg-primary"><?php echo $year; ?></span> 年参加 <span class="badge bg-success"><?php echo($exam) ?></span> 考
            <br><br>

            <h3><i class="bi bi-bookmark"></i>就读状态</h3>
            此年级的学生目前 <?php echo $status ;?> <?php echo $gs ;?>
            
        </div>
    </body>
</html>