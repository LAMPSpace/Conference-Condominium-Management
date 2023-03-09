<?php

namespace Modules\User\src\Services;

use App\Services\BaseService;
use Modules\User\src\Repositories\UserRepository;

class UserService extends BaseService
{
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
