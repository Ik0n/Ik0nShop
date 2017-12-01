<?php
/**
 * Created by PhpStorm.
 * User: Ik0n1
 * Date: 01.12.2017
 * Time: 14:33
 */

namespace App\Repositories;


use App\Entities\Message;
use App\Entities\User;
use Eloquent;

class MessageRepository extends AbstractRepository {

    public function __construct(Message $entity)
    {
        parent::__construct($entity);
    }

    public function store(User $user, int $externalId, string $text) : Message{

        return $this->entity->create([
            'user_id' => $user->id,
            'external_id' => $externalId,
            'text' => $text
        ]);

    }

}