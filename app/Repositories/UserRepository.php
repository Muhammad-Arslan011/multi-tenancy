<?php

namespace App\Repositories;

use App\Http\Helpers\Helper;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function all()
    {
        $users = User::all();

        $usersWithFullImageUrl = $users->map(function ($user) {
            $user['image_url'] = url('images/' . $user['image_url']);
            return $user;
        });

        return Helper::successMessage('Users', $usersWithFullImageUrl);
    }

    public function store($data)
    {
        $image = $data->file('image_url');
        $imagePath = public_path('images');
        $imageName = $image->getClientOriginalName();
        $image->move($imagePath, $imageName);

        User::create([
            'name' => $data->name,
            'email' => $data->email,
            'image_url' => $imageName,
            'password' => $data->password,
        ]);
    }
}
