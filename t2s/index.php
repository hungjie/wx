<?php
require_once 'config.php';
require_once 'util/response_util.php';

if ($_GET['echostr']) {
    echo $_GET['echostr'];
    exit();
}

$data = file_get_contents("php://input");

if ($data) {
    $input = simplexml_load_string($data);

//    session_id("user" . $input->FromUserName);
//    session_start();

    $peer_id = $input->FromUserName;

    $self_id = $input->ToUserName;
    $create_time = $input->CreateTime;

    switch ($input->MsgType) {
        case 'event':
            if ($input->Event == 'subscribe') {
                //TODO sub
                echo demo_response_article($peer_id, $self_id);
            } else if ($input->Event == 'unsubscribe') {
                //TODO unsub
            } else if ($input->Event == 'LOCATION') {
                // TODO location
                $input->Latitude; //	 地理位置纬度
                $input->Longitude; //	 地理位置经度
                $input->Precision; //	 地理位置精度
            } else if ($input->Event == 'CLICK') {
                // TODO click menu
                $input->EventKey;
            }
            break;
        case 'text':
            $input->Content; //	 文本消息内容
            $input->MsgId; //	 消息id，64位整型
            echo demo_response_article($peer_id, $self_id);
            break;
        default:
            break;
    }
}

function demo_response_article($peer_id, $self_id){
    global $config;
    $u = $peer_id;
    $articles = array(
        array('title' => '开心订餐' , 'desc' => '欢迎使用开心订餐', 'pic_url' => '', 'url' => ''),
        array('title' => '红烧牛肉饭' , 'desc' => '12元', 'pic_url' => '', 'url' => dirname($config['url']) . "/p.php?u=$u&id=1"),
        array('title' => '江湖炒饭' , 'desc' => '13元', 'pic_url' => '', 'url' => dirname($config['url']) . "/p.php?u=$u&id=2"),
        array('title' => '蜜汁排骨饭' , 'desc' => '15元', 'pic_url' => '', 'url' => dirname($config['url']) . "/p.php?u=$u&id=3"),
        array('title' => '秋刀鱼饭' , 'desc' => '15元', 'pic_url' => '', 'url' => dirname($config['url']) . "/p.php?u=$u&id=4"),
    );
    return response_article($peer_id, $self_id, $articles);
}
?>
