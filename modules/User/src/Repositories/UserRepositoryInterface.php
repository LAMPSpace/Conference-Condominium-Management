<?php

namespace Modules\User\src\Repositories;

use App\Interfaces\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getUsers();
    public function setPassword($id, $password);
    public function checkPassword($id, $password);
}