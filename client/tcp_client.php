<?php


    //���� swoole tcp ����

    $client = new swoole_client(SWOOLE_SOCK_TCP);

    //$client->connect("127.0.0.1",9501) == false==����ʧ��
    if (!$client->connect("127.0.0.1",9501)) {
        echo "����ʧ��";
        exit;
    }

    //php cli����
    fwrite(STDOUT,'��������Ϣ:');
    $msg = trim(fgets(STDIN));

    //������Ϣ��tcp server������
    $client->send($msg);
    //��������server������   recv()  ��ȡ���ص�����
    $result = $client->recv();
    echo $result;