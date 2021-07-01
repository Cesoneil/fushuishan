<?php

$valid_token = 'envl26tjbcnf234d3433m324m2234';

//获取GitHub发送的内容
$json = file_get_contents('php://input');
$content = json_decode($json, true);

//github发送过来的签名
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];

if (!$signature) { return http_response_code(404); }
list($algo, $hash) = explode('=', $signature, 2);
//计算签名
$payloadHash = hash_hmac($algo, $json, $valid_token);

// 判断签名是否匹配
if ($hash === $payloadHash) {
    $result = exec("cd /usr/develop/SuperMiners/; git stash; git pull origin master 2>&1",$output);
    echo '<pre>';
    var_dump($output); //这样可以用浏览器调试输出
}else{
    $error  = 'Error: Token mismatch!'.PHP_EOL;
    $error .= $content['head_commit']['author']['name'] . ' 在' . date('Y-m-d H:i:s') . '向' . $content['repository']['name'] . '项目的' . $content['ref'] . '分支push了' . count($content['commits']) . '>个commit：' . PHP_EOL;
    $error .= '密钥不正确不能pull'.PHP_EOL;
    die($error);
}


