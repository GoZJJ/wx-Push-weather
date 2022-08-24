<?php
    //WxPusher微信推送服务生成的Token 填写自己的token
    $wxpusherToken = "WxPusher微信推送服务生成的Token";
    
    //高德用户的key 去高德免费申请
    //地址https://console.amap.com/dev/index
    //添加一个应用  在应用中添加key的时候 一定要选择  Web服务 很重要 别搞错了
    $gaoDeKey = "高德用户的key";
    
    //地区代码 （必须使用高德地图提供的地区代码）
    //高德官方地区代码 自查 https://a.amap.com/lbs/static/amap_3dmap_lite/AMap_adcode_citycode.zip
    $region = "410823";
    
    //你们在一起的时间 格式****-**-** 如1999-09-09
    $loveDate = "****-**-**";
    
     //您的备注
     $myName = "小明";
     
    //您的生日 格式****-**-** 如1999-09-09
    $birthdayDate = "****-**-**";
    
    //您对她（他）的备注
    $herName = "小红";
    
    //她（他）的生日 格式****-**-** 如1999-09-09
    $herBirthdayDate = "****-**-**";
    
    //推送消息的大标题
    $Title = "小明日报";
    
    //背景图片api 要求api返回信息是图片  
    //第三方api 随时失效不建议使用
    $pictureApi = "https://api.paugram.com/wallpaper/";
    
    //随机一言api  要求api返回信息直接是内容  
    //第三方api 随时失效不建议使用
    $sayApi = "https://v1.jinrishici.com/all.svg";
    
    //你要推送的uid 这个uid可以在WxPusher微信推送服务中看到
    //地址https://wxpusher.zjiecode.com/admin/main/wxuser/list
    //可以添加多个推送人 
    $UID = [
        "收件人1的uid",
        //"收件人2的uid",
        ];
    
    //消息推送服务最上方的链接
    $URL = "";
    
?>