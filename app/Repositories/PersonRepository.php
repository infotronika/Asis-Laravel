<?php

namespace App\Repositories;

use App\User;
use App\Person;

class PersonRepository
{
    /**
     * Get all of the persons for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Person::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}
