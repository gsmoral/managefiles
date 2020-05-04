<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    public function payforthis(User $user)
    {
        if ($user->hasRole('Admin')){
            return false;
        }
        return true;
    }

    /**
     * Create a new policy instance.
     *
     * @return void
     */
/*     public function __construct()
    {
        //
    } */
}
