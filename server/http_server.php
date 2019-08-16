<?php

$http = new swoole_http_server("0.0.0.0",9502);


$http->set([
    'enable_static_handler' => true,
    'document_root' => '/Users/xiexiangdong/Documents/code/text1/dome/data'
]);

//$request == 获取信息  $response==返回信息
$http->on('request',function ($request,$response){
    $httpdata = json_encode($request->get);
    $response->end("信息--".$httpdata);
});

$http->start();
