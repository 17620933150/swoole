<?php


    //连接 swoole tcp 服务

    $client = new swoole_client(SWOOLE_SOCK_TCP);

    //$client->connect("127.0.0.1",9501) == false==连接失败
    if (!$client->connect("127.0.0.1",9501)) {
        echo "连接失败";
        exit;
    }

    //php cli常量
    fwrite(STDOUT,'请输入信息:');
    $msg = trim(fgets(STDIN));

    //发送消息给tcp server服务器
    $client->send($msg);
    //接受来自server的数据   recv()  获取返回的数据
    $result = $client->recv();
    echo $result;