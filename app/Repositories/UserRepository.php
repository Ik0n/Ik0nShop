<?php

namespace App\Repositories;
use App\Entities\User;

/**
 * Created by PhpStorm.
 * User: Ik0n1
 * Date: 01.12.2017
 * Time: 14:01
 */

class UserRepository extends AbstractRepository
{

    private $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function store(integer $id, string $firstName, string $lastName, string $userName) : User {

        $values = [
            'telegram_id' => $id,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'username' => $userName
        ];

        return $this->entity->firstOrCreate(['telegram_id' => $id], $values);
    }
}