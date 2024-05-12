<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->email === 'a1@a1.com';
    }

    public function edit(User $user): bool
    {
        return (bool) mt_rand(0,1);
    }

}
