<?php

$http = new swoole_http_server("0.0.0.0",9502);


$http->set([
    'enable_static_handler' => true,
    'document_root' => '/Users/xiexiangdong/Documents/code/text1/dome/data'
]);

//$request == ��ȡ��Ϣ  $response==������Ϣ
$http->on('request',function ($request,$response){
    $httpdata = json_encode($request->get);
    $response->end("��Ϣ--".$httpdata);
});

$http->start();
