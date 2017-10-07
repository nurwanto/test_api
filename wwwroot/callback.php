<?php // callback.php
define("LINE_MESSAGING_API_CHANNEL_SECRET", 'fba8c92373f40f0bc056965e9c316cae');
define("LINE_MESSAGING_API_CHANNEL_TOKEN", '+yU1saW7vhNpawhuXNPhJwE5pUoAOgyrcKCwMh0jz26ttYZUiKKgHNqPH9pmU0+WULaWgFitNyZby06p4rXqn0hV/yT71YQp6wydpXhdyShCVyyrtsZ3Lf3ZzjEc6ErrCC17qkcIHzZBU7FdxowikwdB04t89/1O/w1cDnyilFU=');

require __DIR__."/../vendor/autoload.php";

$bot = new \LINE\LINEBot(
    new \LINE\LINEBot\HTTPClient\CurlHTTPClient(LINE_MESSAGING_API_CHANNEL_TOKEN),
    ['channelSecret' => LINE_MESSAGING_API_CHANNEL_SECRET]
);

$signature = $_SERVER["HTTP_".\LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE];
$body = file_get_contents("php://input");

$events = $bot->parseEventRequest($body, $signature);

foreach ($events as $event) {
    if ($event instanceof \LINE\LINEBot\Event\MessageEvent\TextMessage) {
        $reply_token = $event->getReplyToken();
        $text = $event->getText();
        $text1 = "hahaha :)"
        $bot->replyText($reply_token, "Your request:\n".json_encode($body));
        // $bot->replyText($reply_token, "Your response");
        // $bot->replyText($reply_token, json_encode($text1));
        // $bot->replyText($reply_token, $text1);
    }
}

echo "OK";
?>