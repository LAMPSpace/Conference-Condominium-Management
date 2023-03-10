<?php

namespace Modules\User\src\Repositories;

use Modules\User\src\Models\User;
use App\Repositories\EloquentRepository;
use Modules\User\src\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getUsers($limit, $search, $order, $dir)
    {
        // TODO: Implement getUsers() method.
    }

    public function setPassword($id, $password)
    {
        $user = $this->show($id);
        if (!$user) {
            return false;
        }
        $user->salt = createSalt();
        $user->password = Hash::make($password . $user->salt);
        $user->save();
        return $user;
    }

    public function checkPassword($id, $password): bool
    {
        $user = $this->show($id);
        if (!$user) {
            return false;
        }
        return Hash::check($password . $user->salt, $user->password);
    }
}
