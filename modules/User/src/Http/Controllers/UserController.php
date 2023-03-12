<?php

namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\src\Services\UserService;
use Modules\User\src\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->all();
        $pageTitle = 'Manage Users';
        return view('User::list', compact('pageTitle', 'users'));
    }

    public function create(CreateUserRequest $request)
    {
        $pageTitle = 'Create User';
        $groups = [
            '1' => 'Admin',
            '2' => 'User',
        ];
        return view('User::create', compact('pageTitle', 'groups'));
    }
}