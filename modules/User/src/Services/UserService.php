<?php

namespace Modules\User\src\Services;

use App\Services\BaseService;
use Modules\User\src\Services\UserServiceInterface;
use Modules\User\src\Repositories\UserRepository;

class UserService extends BaseService implements UserServiceInterface
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getUsers(array $params)
    {
        $limit = $params['limit'] ?? 10;
        $search = $params['search'] ?? '';
        $order = $params['order'] ?? 'id';
        $dir = $params['dir'] ?? 'asc';

        return $this->repository->getUsers($limit, $search, $order, $dir);
    }

    public function setPassword($id, $oldPassword, $password)
    {
        if (!$this->repository->checkPassword($id, $oldPassword)) {
            return false;
        }
        return $this->repository->setPassword($id, $password);
    }
}
