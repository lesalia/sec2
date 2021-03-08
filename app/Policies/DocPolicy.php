<?php

namespace App\Policies;

use App\Models\Doc;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

//    public function updateDoc(User $user, Doc $doc)
//    {
//        return $user->id == $doc->user_id;
//    }
}
