<?php

namespace App\Repositories;

use App\Person;
use App\Contact;

class ContactRepository
{
    /**
     * Get all of the contacts for a given person.
     *
     * @param  Person  $person
     * @return Collection
     */
    public function forPerson(Person $person)
    {
        return Contact::where('person_id', $person->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}
