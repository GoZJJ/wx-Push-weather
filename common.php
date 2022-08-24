<?php
    class Daily {
        
        //构造方法 初始化相关参数
        function Daily ($wxpusherToken,$gaoDeKey,$region,$loveDate,$myName,$birthdayDate,$herName,$herBirthdayDate,$pictureApi,$sayApi){
            $this->wxpusherToken = $wxpusherToken;
            $this->gaoDeKey = $gaoDeKey;
            $this->region = $region;
            $this->loveDate = $loveDate;
            $this->myName = $myName;
            $this->birthdayDate = $birthdayDate;
            $this->herName = $herName;
            $this->herBirthdayDate = $herBirthdayDate;
            $this->Title = $Title;
            $this->pictureApi = $pictureApi;
            $this->sayApi = $sayApi;
            
        }
        function getMyName(){
            echo($this->myName);
        }
        
        //查询天气  
        function getWeather(){
            $url = "https://restapi.amap.com/v3/weather/weatherInfo?city=".$this->region."&key=".$this->gaoDeKey;
            $data = json_decode(file_get_contents($url),true);
            $retData = $data["lives"][0];
            //返回内容参考
            //Array ( [status] => 1 [count] => 1 [info] => OK [infocode] => 10000 [lives] => Array ( [0] => Array ( [province] => 河南 [city] => 武陟县 [adcode] => 410823 [weather] => 多云 [temperature] => 27 [winddirection] => 北 [windpower] => ≤3 [humidity] => 60 [reporttime] => 2022-08-24 18:00:19 ) ) ) 
            return $retData;
        }
        
        //生日 在一起时间差
        function getDiffDate(){
            $now = getDate();
            $nowTime = date_create($now["year"].'-'.$now["mon"].'-'.$now["mday"]);
            
            $loveDate = date_create($this->loveDate);
            $loveDiff = date_diff($loveDate, $nowTime)->format('%R%a')+1; 
            
            $birthdayDate = date_create(($now["year"]-1)."-".explode("-",$this->birthdayDate)[1]."-".explode("-",$this->birthdayDate)[2]); 
            $birthdayDiff = date_diff($birthdayDate, $nowTime)->format('%R%a'); 
            if($birthdayDiff>365) {
                $birthdayDiff = 365-($birthdayDiff-365);
            }elseif($birthdayDiff<365) {
                $birthdayDiff = 365-$birthdayDiff;
            }else{
                $birthdayDiff = 0;
            }
            
            $herBirthdayDate = date_create(($now["year"]-1)."-".explode("-",$this->herBirthdayDate)[1]."-".explode("-",$this->herBirthdayDate)[2]); 
            $herBirthdayDiff = date_diff($herBirthdayDate, $nowTime)->format('%R%a'); 
            if($herBirthdayDiff>365) {
                $herBirthdayDiff = 365-($herBirthdayDiff-365);
            }elseif($herBirthdayDiff<365) {
                $herBirthdayDiff = 365-$herBirthdayDiff;
            }else{
                $herBirthdayDiff = 0;
            }
            
            $retData = [
                "birthdayDiff" => $birthdayDiff,
                "herBirthdayDate" => $herBirthdayDiff,
                "loveDiff" =>  $loveDiff,
          ];
          return $retData;
        }
        
        //随机一言
        function getMySay(){
            $url="https://v1.jinrishici.com/all.svg";
            $retDate = file_get_contents($url);
            return $retDate;
        }
        
        //背景图片url
        function getPictureUrl(){
            return $this->pictureApi;
        }
        
        function send_post($url, $post_data) {
          $options = array(
              'http' => array(
              'method' => 'POST',
              'header' => 'Content-Type:application/json',
              'content' => $post_data,
              'timeout' => 15 * 60 // 超时时间（单位:s）
            )
          );
          $context = stream_context_create($options);
          $result = file_get_contents($url, false, $context);
          return $result;
        } 
        
        
    }

?>