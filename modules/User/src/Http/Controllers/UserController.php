<?php

namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
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

    public function create()
    {
        $pageTitle = 'Create User';
        $groups = [
            '0' => 'Admin',
            '1' => 'User',
        ];
        return view('User::create', compact('pageTitle', 'groups'));
    }

    public function store(CreateUserRequest $request)
    {
        $this->userService->create($request->all());
        return redirect()->route('users.index')->with('msg', __('User::messages.create_success'));
    }

    public function datatable()
    {
        return DataTables::of($this->userService->getUsers())
            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                return view('User::partials.actions', compact('user'));
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('d-m-Y');
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at->format('d-m-Y');
            })
            ->editColumn('email_verified_at', function ($user) {
                return view('User::partials.verified', compact('user'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function edit($id)
    {
        $pageTitle = 'Edit User';
        $user = $this->userService->show($id);
        $groups = [
            '0' => 'Admin',
            '1' => 'User',
        ];

        if (!$user) {
            abort(404);
        }
        return view('User::edit', compact('pageTitle', 'user', 'groups'));
    }

    public function update(CreateUserRequest $request, $id)
    {
        $data = $request->except(['_token', '_method', 'password', 'username']);

        if ($request->password) {
            $passwordWithSalt = createPassword($request->password);
            $data['password'] = $passwordWithSalt['password'];
            $data['salt'] = $passwordWithSalt['salt'];
        }
        $this->userService->update($data, $id);
        return back()->with('users.index')->with('msg', __('User::messages.update_success'));
    }
}