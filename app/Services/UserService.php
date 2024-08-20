<?php

namespace App\Services;

use App\Exceptions\DomainException;
use App\Models\User;
use App\Traits\UserFinder;
use Illuminate\Support\Facades\Hash;

class UserService
{
    use UserFinder;

    public function create(array $data)
    {
        $existingUser = $this->findUserByEmail($data['email']);
        if ($existingUser) {
            throw new DomainException(['E-mail is already in use.'], 409);
        }

        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }
}