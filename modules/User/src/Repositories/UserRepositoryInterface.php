<?php

namespace Modules\User\src\Repositories;

use App\Interfaces\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUsers($limit, $search, $order, $dir);
    public function setPassword($id, $password);
    public function checkPassword($id, $password);
}