<?php
/**
 * Created by PhpStorm.
 * User: Ik0n1
 * Date: 01.12.2017
 * Time: 15:33
 */

namespace App\Console\Commands;

class UpdateTelegramWebhook
{
    protected $signature = 'telegram:webhook:update';
    protected $description = 'Обновить данные webhook';

    public function handle() {

        $url = str_replace('http://', 'https://', route('telegram.webhook'));

        \Telegram::bot()->setWebhook([

        ]);
    }
}