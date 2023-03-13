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

    public function getUsers()
    {
        return $this->repository->getUsers();
    }

    public function setPassword($id, $oldPassword, $password)
    {
        if (!$this->repository->checkPassword($id, $oldPassword)) {
            return false;
        }
        return $this->repository->setPassword($id, $password);
    }

    public function create(array $data)
    {
        $passwordWithSalt = createPassword($data['password']);
        $data['password'] = $passwordWithSalt['password'];
        $data['salt'] = $passwordWithSalt['salt'];
        return $this->repository->create($data);
    }
}
