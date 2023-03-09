<?php

namespace Modules\User\src\Repositories;

use App\Repositories\EloquentRepository;
use Modules\User\src\Repositories\UserRepositoryInterface;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        
    }
}
