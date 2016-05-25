<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use App\Repositories\PersonRepository;

class PersonController extends Controller
{
    /**
     * The Person repository instance.
     *
     * @var PersonRepository
     */
    protected $persons;

    /**
     * Create a new controller instance.
     *
     * @param  PersonRepository  $persons
     * @return void
     */
    public function __construct(PersonRepository $persons)
    {
        $this->middleware('auth');

        $this->persons = $persons;
    }

	/**
	 * Display a list of all of the user's persons.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		return view('persons.index', [
            'persons' => $this->persons->forUser($request->user()),
        ]);
	}

	/**
	 * Create a new person.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'firstname' => 'required|max:255',
			'lastname' => 'required|max:255',
		]);


        $request->user()->persons()->create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
        ]);

        return redirect('/persons');
	}

    /**
     * Show the given person.
     *
     * @param  Request  $request
     * @param  Person  $person
     * @return Response
     */
    public function show(Request $request, Person $person)
    {
        return view('persons.show')->withPerson($person);
    }

    /**
     * Edit the given person.
     *
     * @param  Request  $request
     * @param  Person  $person
     * @return Response
     */
    public function edit(Request $request, Person $person)
    {
        return view('persons.edit')->withPerson($person);
    }

    /**
     * Update the given person.
     *
     * @param  Request  $request
     * @param  Person  $person
     * @return Response
     */
    public function update(Request $request, Person $person)
    {
		$input = $request->all();
        $person->fill($input)->save();

        return redirect('/persons');
    }

    /**
     * Destroy the given person.
     *
     * @param  Request  $request
     * @param  Person  $person
     * @return Response
     */
    public function destroy(Request $request, Person $person)
    {
        $this->authorize('destroy', $person);

        $person->delete();

        return redirect('/persons');
    }
}
