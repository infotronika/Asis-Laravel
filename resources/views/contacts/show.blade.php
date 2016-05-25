<!-- resources/views/contacts/show.blade.php -->

@extends('persons.show')

@section('contacts')

    <!-- Bootstrap Boilerplate... -->

    <!-- Current Contacts -->
    @if (count($contacts) > 0)
    <div class="panel-body col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Kontakty
            </div>

            <div class="panel-body">
                <table class="table table-striped person-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Telefon</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <!-- Phone Number -->
                                <td class="table-text">
                                    <div>{{ $contact->phone }}</div>
                                </td>

                                <td>
									<form action="{{ url('/person/'.$person->id.'/contact/'.$contact->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<button type="submit" id="delete-contact-{{ $person->id }}" class="btn btn-danger">
											<i class="fa fa-btn fa-trash"></i>Usuń
										</button>
									</form>
                                </td>
                                <td>
									<form action="{{ url('/person/'.$person->id.'/contact/'.$contact->id) }}" method="GET">
										{{ csrf_field() }}

										<button type="submit" id="edit-contact-{{ $person->id }}" class="btn btn-danger">
											<i class="fa fa-btn fa-pencil-square"></i>Edytuj
										</button>
									</form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	@else
		<div>Brak</div>
    @endif
    <div class="panel-body col-sm-6" style="clear: both;">
        <!-- Display Validation Errors -->

        <!-- New Contact Form -->
        <form action="{{ url('/person/'.$person->id.'/contact') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Phone Number -->
            <div class="form-group">
                <label for="contact-phone" class="col-sm-3 control-label">Telefon</label>

                <div class="col-sm-6">
                    <input type="text" name="phone" id="contact-phone" class="form-control">
                </div>
            </div>

            <!-- Add Contact Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Dodaj kontakt
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
