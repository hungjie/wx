<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function response_text($to_id, $from_id, $text) {
    $time = time();
    return <<<ETO
    <xml>
<ToUserName><![CDATA[$to_id]]></ToUserName>
<FromUserName><![CDATA[$from_id]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[$text]]></Content>
</xml>
ETO;
}

function response_image($to_id, $from_id, $image_id) {
    $time = time();
    return <<<ETO
    <xml>
<ToUserName><![CDATA[$to_id]]></ToUserName>
<FromUserName><![CDATA[$from_id]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
<Image>
<MediaId><![CDATA[$image_id]]></MediaId>
</Image>
</xml>
ETO;
}

function response_voice($to_id, $from_id, $voice_id) {
    $time = time();
    return <<<ETO
    <xml>
<ToUserName><![CDATA[$to_id]]></ToUserName>
<FromUserName><![CDATA[$from_id]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[voice]]></MsgType>
<Voice>
<MediaId><![CDATA[$voice_id]]></MediaId>
</Voice>
</xml>
ETO;
}

function response_video($to_id, $from_id, $video_id, $title = '', $desc = '') {
    $time = time();
    return <<<ETO
    <xml>
<ToUserName><![CDATA[$to_id]]></ToUserName>
<FromUserName><![CDATA[$from_id]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[video]]></MsgType>
<Video>
<MediaId><![CDATA[$video_id]]></MediaId>
<Title><![CDATA[$title]]></Title>
<Description><![CDATA[$desc]]></Description>
</Video> 
</xml>
ETO;
}

function response_music($to_id, $from_id, $thumbnail_id, $music_url, $hq_music_url = '', $title = '', $desc = '') {
    $time = time();
    return <<<ETO
    <xml>
<ToUserName><![CDATA[$to_id]]></ToUserName>
<FromUserName><![CDATA[$from_id]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[music]]></MsgType>
<Music>
<Title><![CDATA[$title]]></Title>
<Description><![CDATA[$desc]]></Description>
<MusicUrl><![CDATA[$music_url]]></MusicUrl>
<HQMusicUrl><![CDATA[$hq_music_url]]></HQMusicUrl>
<ThumbMediaId><![CDATA[$thumbnail_id]]></ThumbMediaId>
</Music>
</xml>
ETO;
}

function response_article($to_id, $from_id, $articles) {
    $time = time();
    $count = count($articles);
    $i = 0;
    $items = array();
    foreach ($articles as $item) {
        if (++$i > 10) {
            $count = 10;
            break;
        }
        $items[] = <<<ETO
        <item>
<Title><![CDATA[{$item['title']}]]></Title> 
<Description><![CDATA[{$item['desc']}]]></Description>
<PicUrl><![CDATA[{$item['pic_url']}]]></PicUrl>
<Url><![CDATA[{$item['url']}]]></Url>
</item>
ETO;
    }
    $items_str = join("\n", $items);
    $response = <<<ETO
    <xml>
<ToUserName><![CDATA[$to_id]]></ToUserName>
<FromUserName><![CDATA[$from_id]]></FromUserName>
<CreateTime>$time</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>$count</ArticleCount>
<Articles>
    $items_str
</Articles>
</xml> 
ETO;
    return $response;
}

?>
