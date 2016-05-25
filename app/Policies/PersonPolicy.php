<?php

namespace App\Policies;

use App\User;
use App\Person;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can delete the given person.
     *
     * @param  User  $user
     * @param  Person  $person
     * @return bool
     */
    public function destroy(User $user, Person $person)
    {
        return $user->id === $person->user_id;
    }

    /**
     * Determine if the given user can delete the given person.
     *
     * @param  User  $user
     * @param  Person  $person
     * @return bool
     */
    public function update(User $user, Person $person)
    {
        return $user->id === $person->user_id;
    }

    /**
     * Determine if the given user can delete the given person.
     *
     * @param  User  $user
     * @param  Person  $person
     * @return bool
     */
    public function show(User $user, Person $person)
    {
        return $user->id === $person->user_id;
    }
}
