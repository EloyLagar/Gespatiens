<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine if the user is an admin.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function admin(User $user)
    {
        return $user->speciality === 'admin';
    }
}
