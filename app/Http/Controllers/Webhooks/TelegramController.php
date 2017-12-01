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
use Telegram\Bot\Keyboard\Keyboard;

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
            $keyboard = [['slish'], ['tobi'], ['pizda']];

          Telegram::bot()->sendMessage([
              'chat_id' => $user->telegram_id,
              'text' => "Ебать работаит",
              'reply_markup' => Keyboard::make([
                 'keyboard' => $keyboard,
                 'resize_keyboard' => true,
                 'one_time_keyboard' => true
              ]),
          ]);
        }
    }
}