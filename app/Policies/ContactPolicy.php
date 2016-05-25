<?php

namespace App\Policies;

use App\User;
use App\Person;
use App\Contact;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
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
     * Determine if the given user can delete the given contact.
     *
     * @param  User  $user
     * @param  Person  $person
     * @param  Contact $contact
     * @return bool
     */
    public function destroy(User $user, Person $person, Contact $contact)
    {
        return $user->id === $person->user_id && $person->id === $contact->person_id;
    }

    /**
     * Determine if the given user can delete the given contact.
     *
     * @param  User  $user
     * @param  Person  $person
     * @param  Contact $contact
     * @return bool
     */
    public function update(User $user, Person $person, Contact $contact)
    {
        return $user->id === $person->user_id && $person->id === $contact->person_id;
    }

    /**
     * Determine if the given user can show the given contact.
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
