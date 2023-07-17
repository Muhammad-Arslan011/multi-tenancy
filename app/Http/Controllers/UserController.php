<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Helper;
use App\Http\Requests\Users\CreateUserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
       return $this->userRepository->all();
    }

    public function store(CreateUserRequest $request)
    {
        $this->userRepository->store($request);
        return Helper::successMessage('User has been created successfully');
    }
}
