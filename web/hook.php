<?php

$valid_token = 'envl26tjbcnf234d3433m324m2234';
$client_token = $_GET['token'];
if ($client_token !== $valid_token) die('Token mismatch!');
$result = exec("cd /usr/develop/SuperMiners/; git pull origin master 2>&1",$output);
echo '<pre>';
var_dump($output); //这样可以用浏览器调试输出
