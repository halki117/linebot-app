<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $client = new \GuzzleHttp\Client();
        $url = 'http://localhost:80/api/message';

        $response = $client->request(
            'GET',
            $url,
        );

        logger($response->getStatusCode());
    }
}
