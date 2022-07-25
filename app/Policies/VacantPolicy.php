<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacant;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacantPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Vacant $vacant)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Vacant $vacant)
    {
        return $user->id === $vacant->user_id;
    }

    public function delete(User $user, Vacant $vacant)
    {
        //
    }

    public function restore(User $user, Vacant $vacant)
    {
        //
    }

    public function forceDelete(User $user, Vacant $vacant)
    {
        //
    }
}
