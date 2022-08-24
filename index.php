<?php 
include("./config.php");
include './common.php';

    //推送消息
    $Daily = new Daily($wxpusherToken,$gaoDeKey,$region,$loveDate,$myName,$birthdayDate,$herName,$herBirthdayDate,$pictureApi,$sayApi);
	$getTianqi =  $Daily->getWeather(); //得到天气
	$getDiffDate = $Daily->getDiffDate();//得到时间差
	$myMsg = $Daily->getMySay();
	$readyData = $getTianqi["city"]."\n天气：".$getTianqi["weather"]."\n温度：".$getTianqi["temperature"]."\n".$getTianqi["winddirection"]."风".$getTianqi["windpower"]."级";
	$htmlText = '<div style="margin: 0 0;padding: 0 0;background-image: url('.$Daily->getPictureUrl().');background-size: 100% 100%;width: 380px;
	height:600px;background-repeat: no-repeat;">
		<div style="width: 380px;height:600px;margin: 0 0;padding: 0 0;text-align:center;border-width:1px;border-style:solid;border-color:rgb(253, 253, 253);background-color:#FDFDFDBB;border-radius:20px;">
			<div style="text-align: left;margin: 0 20%;padding: 3% 0 35% 0;line-height: 1px;height: 200px;">
				<h3>'.$Title.'</h3>
				<p style="color: #526cf9;">地区：'.$getTianqi["city"].'</p>
				<p style="color: #7607fb;">天气：'.$getTianqi["weather"].'</p>
				<p style="color: #7607fb;">温度：'.$getTianqi["temperature"].'</p>
				<p style="color: #ff5bf5;">风向：'.$getTianqi["winddirection"].'</p>
				<p style="color: #ff9001;">距离'.$Daily->myName.'下一个生日：'.$getDiffDate["birthdayDiff"].'天</p>
				<p style="color: #ff9001;">距离'.$Daily->herName.'下一个生日：'.$getDiffDate["herBirthdayDate"].'天</p>
				<p style="color: #0800f0;">我们已经在一起：'.$getDiffDate["loveDiff"].'天</p>
				<p style="margin-top: -30%;line-height: 200%;color: #FF0000;text-indent: 30px;">'.$Daily->getMySay().'</p>
			</div>
		</div>
	</div>';
	 $post_data = array(
      	"appToken" => $Daily->wxpusherToken,//wxpusher推送者token
        "content" => $htmlText,//数据体
        "summary" => $readyData, //摘要限制100字符
        "contentType" => 1, //推送类型 1 文本 2html 3 markdown
        "topicIds" => [  //群发uid 类型：数组
        ],
        "uids" =>  $UID ,
        "url" => $URL //观看连接 (可选参数)
	);
	$post_data = json_encode($post_data);
	$ret = json_decode($Daily->send_post('http://wxpusher.zjiecode.com/api/send/message', $post_data),true);
	print_r("本次运行结束");
	
?>	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php快速上手：第一个php程序</title>
    <style>
        body{
            background-color:black;
            color:#fff;
        }

        span{
            color:lightblue;
        }
    </style>
</head>
<body>
    <?php
      echo($htmlText);
    ?>
</body>
</html>
