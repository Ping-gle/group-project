<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    function __construct()
    {
        //
    }

    function update(User $user) 
    {
        return $user->isAdministrator();
    }

    function create(User $user) 
    {
        return $this->update($user);
    }

    function delete(User $user) 
    {
        
        return $this->update($user);
    }
}
