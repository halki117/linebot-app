<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;


class MessageController extends Controller
{
    public function sendMessage() {

        $httpClient = new CurlHTTPClient($_ENV['LINE_CHANNEL_ACCESS_TOKEN']);
        $bot = new LINEBot($httpClient, ['channelSecret' => $_ENV['LINE_CHANNEL_SECRET']]);

        $message = '';
        switch(date('w')){
            case '0': //日曜日
                break;
            case '1': //月曜日
                $message = '古紙・衣類';
                break;
            case '2': //火曜日
                $message = '資源ゴミ';
                break;
            case '3': //水曜日
                $message = '普通ゴミ';
                break;
            case '4': //木曜日
                break;
            case '5': //金曜日
                $message = '普通ゴミ';
                break;
            case '6': //土曜日
                $message = '普通ゴミ';
                break;
        }

        if(!empty($message)){
            $textMessageBuilder = new TextMessageBuilder('今日は'.$message.'の日です！！');
        } else {
            $textMessageBuilder = new TextMessageBuilder('今日はゴミ回収はありません');
        }

        $bot->pushMessage('Ufcb9d3287f639a5c4197468114c50537', $textMessageBuilder);

    }
}
