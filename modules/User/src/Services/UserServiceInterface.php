<?php

namespace Modules\User\src\Services;

use App\Interfaces\ServiceInterface;

interface UserServiceInterface extends ServiceInterface
{
    public function getUsers();
    public function setPassword($id, $oldPassword, $password);
}