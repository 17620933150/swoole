<?php
/*
 * websocket 封装类
 */

class Ws {

    CONST HOST = '0.0.0.0';//声明常量
    CONST PORT = 9503;


    public $ws = null;
    public function  __construct()
    {
        $this->ws = new swoole_websocket_server("0.0.0.0", 9503);

        $this->ws->on('opon',[$this,'onOpen']);
        $this->ws->on('message',[$this,'onMessage']);
        $this->ws->on('close',[$this,'onClose']);
        $this->ws->start();

    }
    /*
     * 监听ws连接事件
     */
    public function onOpen($ws,$request) {
        var_dump($request->fd);
    }


    /*
     * 监听数据推送事件
     */
    public function onMessage($ws,$frame) {
        echo "{$frame->data}\n";
        $ws->push($frame->fd,"推送数据\n");
    }

    /*
    *监听断开连接事件
    */
    public function onClose($ws,$fd) {
        echo "断开连接\n";
    }
}

new Ws();


