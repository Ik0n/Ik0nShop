<?php
/**
 * Created by PhpStorm.
 * User: Ik0n1
 * Date: 01.12.2017
 * Time: 13:48
 */

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Repositories\MessageRepository;
use App\Repositories\UserRepository;
use Telegram;

class TelegramController extends Controller
{
    public function process(UserRepository $users, MessageRepository $messages) {
        $update = Telegram::bot()->getWebhookUpdate();

        $message = $update->getMessage();

        $user = $message->getFrom();

        $user = $users->store(
            $user->getId() ?? '',
            $user->getFirstName() ?? '',
            $user->getLastName() ?? '',
            $user->getUsername() ?? ''
        );

        $messages->store($user, $message->getMessageId(), $message->getText() ?? '');

        if($message->getText() == "/start") {
          Telegram::bot()->sendMessage([
              'chat_id' => $user->telegram_id,
              'text' => "Ебать работаит"
          ]);
        }

        if (true) {
            Telegram::bot()->sendMessage([
                'chat_id' => $user->telegram_id,
                'text' => "ПИЗДИШЬ НА МАЛО"
            ]);
        }
    }
}