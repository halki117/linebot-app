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

        $textMessageBuilder = new TextMessageBuilder('こんばんは');

        $bot->pushMessage('Ufcb9d3287f639a5c4197468114c50537', $textMessageBuilder);

    }
}
