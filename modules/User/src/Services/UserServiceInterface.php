<?php

namespace Modules\User\src\Services;

use App\Interfaces\ServiceInterface;

interface UserServiceInterface extends ServiceInterface
{
    public function getUsers(array $params);
    public function setPassword($id, $oldPassword, $password);
}