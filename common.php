<?php
/**
 * @
 * @Author: Sunflower
 * @Date: 2024-05-03 下午4:16
 */


/**
 * 文章
 * @Author: Sunflower
 * @Date: 2024-05-03 下午3:31
 * @param $apiData
 * @param $data
 * @param $newarticle
 * @param $contenthtml
 * @param $act
 * @return array|string|string[]
 */
function htmlart($apiData,$data,$newarticle,$contenthtml,$act)
{
    $html_index_newarticle = $apiData['index_'.$act];
    $index_newarticle = '';
    $newarticlenum = $apiData[$act]<=count($data)?$apiData[$act]:count($data);
    for ($i=0;$i<$newarticlenum;$i++){
        $html = $html_index_newarticle;
        foreach ($newarticle as $key=>$value){
            $html = str_replace('{'.$value.'}',isset($data[$i][$value])?$data[$i][$value]:'',$html);
        }
        $index_newarticle = $index_newarticle.$html;
    }
    return str_replace('{index_'.$act.'}',$index_newarticle,$contenthtml);
}
/**
 * 获取目录文件
 * @Author: Sunflower
 * @Date: 2024-05-03 下午3:23
 * @param $directoryPath
 * @return array|void
 */
function listFilesInDirectory($directoryPath) {
    // 检查目录是否存在
    if (!is_dir($directoryPath)) {
        echo "目录 '$directoryPath' 不存在。";
        return;
    }
    $files = scandir($directoryPath);
    array_shift($files);
    array_shift($files);
    $onlyFiles = array_filter($files, function ($file) use ($directoryPath) {
        return is_file($directoryPath . '/' . $file);
    });

    // 对文件名进行倒序排序
    usort($onlyFiles, function ($a, $b) {
        return strcmp($b, $a); // 倒序比较
    });

    $fileAll = [];
    foreach ($onlyFiles as $file) {
        $fileAll[] = $directoryPath . $file;
    }
    return $fileAll;
}

/**
 * 请求接口
 * @Author: Sunflower
 * @Date: 2024-05-02 下午8:06
 * @param $apiHost
 * @return bool|string
 * @throws Exception
 */
function http_get($apiHost)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiHost);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 返回而不是输出内容
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书验证，仅用于测试环境
    $content = curl_exec($ch);
    if (curl_errno($ch)) {
        curl_close($ch);
        throw new Exception('Error:' . curl_error($ch));
    }
    curl_close($ch);
    return $content;
}

/**
 * 删除文件
 * @Author: Sunflower
 * @Date: 2024-05-02 下午8:06
 * @param $dirPath
 * @return bool
 */
function removeDirectory($dirPath) {
    if (!is_dir($dirPath)) {
        // 如果路径不是一个目录，则直接返回
        return false;
    }
    // 打开目录
    $files = scandir($dirPath);
    array_shift($files); // 移除 '.'（当前目录）
    array_shift($files); // 移除 '..'（上级目录）
    foreach ($files as $file) {
        $filePath = $dirPath . DIRECTORY_SEPARATOR . $file;
        // 如果是目录，则递归删除
        if (is_dir($filePath)) {
            removeDirectory($filePath);
        } else {
            // 如果是文件，则直接删除
            unlink($filePath);
        }
    }
    // 清空目录后，删除目录自身
    return true;
}

/**
 * 内联
 * @Author: Sunflower
 * @Date: 2024-05-04 下午3:21
 * @param $contenthtml
 * @param $keywords
 * @return array|mixed|string|string[]
 */
function inline($contenthtml,$keywords)
{
    $keywordList = preg_split('/\r\n/', $keywords);
    foreach ($keywordList as $k => $v) {
        $keyss = explode('|', $v);
        if(isset($keyss[0]) && isset($keyss[1])){
            $contenthtml = str_replace($keyss[0],"<a href='$keyss[1]' _target='_blank'> $keyss[0]</a>",$contenthtml);
        }
    }
    return $contenthtml;
}
function checkOrCreateDirectory($dirPath) {
    // 检查目录是否存在
    if (!file_exists($dirPath)) {
        // 如果不存在，尝试创建目录
        $permissions = 0755; // 设置权限，例如 rwxr-xr-x
        if (!mkdir($dirPath, $permissions, true)) { // 第三个参数为true，表示递归创建多级目录
            throw new Exception("Failed to create directory: {$dirPath}");
        }
    }
}
function getCurrentFullUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $script_path = $_SERVER['REQUEST_URI'];

    return $protocol . $host . $script_path;
}
