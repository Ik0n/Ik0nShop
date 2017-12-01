<?php
/**
 * Created by PhpStorm.
 * User: Ik0n1
 * Date: 01.12.2017
 * Time: 14:01
 */

namespace App\Repositories;

use Eloquent;

abstract class AbstractRepository
{
    /**
     * @var Eloquent
     */
    protected $entity;

    public function __construct(Eloquent $entity){

        $this->entity = $entity;
    }
}