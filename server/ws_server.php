<?php

//����websocket���������󣬼���0.0.0.0:9502�˿�
$ws = new swoole_websocket_server("0.0.0.0", 9503);

//����WebSocket���Ӵ��¼�
$ws->on('open', function ($ws, $request) {
    var_dump($request->fd, $request->get, $request->server);
    $ws->push($request->fd, "���ӳɹ�");
});

//����WebSocket��Ϣ�¼�
$ws->on('message', function ($ws, $frame) {
    echo "Message: {$frame->data}\n";
    $ws->push($frame->fd, "server: {$frame->data}");
});

//����WebSocket���ӹر��¼�
$ws->on('close', function ($ws, $fd) {
    echo "client-{$fd} is �Ͽ�\n";
});

$ws->start();