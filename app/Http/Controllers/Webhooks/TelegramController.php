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

        $users->store(
            $user->getId() ?? '',
            $user->getFirstName() ?? '',
            $user->getLastName() ?? '',
            $user->getUsername() ?? ''
        );

        $messages->store($user, $message->getMessageId(), $message->getText() ?? '');
    }
}