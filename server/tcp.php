<?php
    //创建Server对象，监听 127.0.0.1:9501端口
    $serv = new Swoole\Server("127.0.0.1", 9501);


    $serv->set([
        'worker_num' => 10,
        "max_request"=>10000,
    ]);

    /*
     * $fd=客户端id
     *$from_id=线程id
     * */
    //监听连接进入事件
    $serv->on('Connect', function ($serv, $fd,$from_id) {
        echo "Client:{$fd}--{$from_id} Connect.\n";
    });

    //监听数据接收事件
    $serv->on('Receive', function ($serv, $fd, $from_id, $data) {
        $serv->send($fd, "Server:{$fd}--{$from_id} ".$data);
    });

    //监听连接关闭事件
    $serv->on('Close', function ($serv, $fd) {
        echo "Client: Close.\n";
    });

    //启动服务器
    $serv->start();