<?php

namespace App\Policies;

use App\Models\Commerce;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommercePolicy
{
    use HandlesAuthorization;

    public function author(User $user, Commerce $commerce){
        if($user->id == $commerce->user_id){
            return true;
        }else{
            return false;
        }
    }
}
