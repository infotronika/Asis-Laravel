<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Person;

use App\Contact;
use App\Repositories\ContactRepository;

class PersonContactController extends Controller
{
    /**
     * The Person repository instance.
     *
     * @var ContactRepository
     */
    protected $contacts;

    /**
     * Create a new controller instance.
     *
     * @param  ContactRepository  $contacts
     * @return void
     */
    public function __construct(ContactRepository $contacts)
    {
        $this->middleware('auth');

        $this->contacts = $contacts;
    }

	/**
	 * Display a list of all of the person's contacts.
	 *
	 * @param  Request  $request
     * @param  Person   $person
	 * @return Response
	 */
	public function show(Request $request, Person $person)
	{
        $this->authorize('show', $person);
		return view('contacts.show', [
            'person' => $person,
            'contacts' => $this->contacts->forPerson($person),
        ]);
	}

	/**
	 * Create a new contact.
	 *
	 * @param  Request  $request
     * @param  Person   $person
	 * @return Response
	 */
	public function store(Request $request, Person $person)
	{
		$this->validate($request, [
			'phone' => 'required|max:255',
		]);


        $person->contacts()->create([
            'phone' => $request->phone,
        ]);

		return view('contacts.show', [
            'person' => $person,
            'contacts' => $this->contacts->forPerson($person),
        ]);
	}

    /**
     * Edit the given contact.
     *
     * @param  Request  $request
     * @param  Person   $person
     * @param  Contact  $contact
     * @return Response
     */
    public function edit(Request $request, Person $person, Contact $contact)
    {
        return view('contacts.edit', [
            'person' => $person,
            'contact' => $contact,
        ]);
    }

    /**
     * Update the given contact.
     *
     * @param  Request  $request
     * @param  Person   $person
     * @param  Contact  $contact
     * @return Response
     */
    public function update(Request $request, Person $person, Contact $contact)
    {
		$input = $request->all();
        $contact->fill($input)->save();

		return view('contacts.show', [
            'person' => $person,
            'contacts' => $this->contacts->forPerson($person),
        ]);
    }

    /**
     * Destroy the given contact.
     *
     * @param  Request  $request
     * @param  Person   $person
     * @param  Contact  $contact
     * @return Response
     */
    public function destroy(Request $request, Person $person, Contact $contact)
    {
        $this->authorize('destroy', $person, $contact);

        $contact->delete();

		return view('contacts.show', [
            'person' => $person,
            'contacts' => $this->contacts->forPerson($person),
        ]);
    }
}
