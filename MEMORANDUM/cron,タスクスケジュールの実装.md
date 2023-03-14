# cron,タスクスケジュールの実装

## Commandの作成
- SendMessageというcommandを作成
```
sail artisan make:command SendMessage
```
app/Console/Commands/ に SendMessage.php が作成される


## エンドポイントを叩く為のライブラリーを導入
- guzzleインストール
```
$ sail composer require guzzlehttp/guzzle
```

- 実際にエンドポイントを以下の様になる
```
$client = new \GuzzleHttp\Client();
$url = 'http://localhost:80/api/message';

$response = $client->request(
    'GET',
    $url,
);
```

## Kernel.phpにcommandの登録
```
protected $commands = [
    Commands\SendMessage::class,
];
```

## タスクスケジューラーへの登録（Kernel.php）
```
protected function schedule(Schedule $schedule): void
{
    $schedule->command('app:send-message')->everyMinute();
}
```


## タスクスケジューラー起動
```
$ sail artisan schedule:work
```
