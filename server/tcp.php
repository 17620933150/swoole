<?php
    //����Server���󣬼��� 127.0.0.1:9501�˿�
    $serv = new Swoole\Server("127.0.0.1", 9501);


    $serv->set([
        'worker_num' => 10,
        "max_request"=>10000,
    ]);

    /*
     * $fd=�ͻ���id
     *$from_id=�߳�id
     * */
    //�������ӽ����¼�
    $serv->on('Connect', function ($serv, $fd,$from_id) {
        echo "Client:{$fd}--{$from_id} Connect.\n";
    });

    //�������ݽ����¼�
    $serv->on('Receive', function ($serv, $fd, $from_id, $data) {
        $serv->send($fd, "Server:{$fd}--{$from_id} ".$data);
    });

    //�������ӹر��¼�
    $serv->on('Close', function ($serv, $fd) {
        echo "Client: Close.\n";
    });

    //����������
    $serv->start();