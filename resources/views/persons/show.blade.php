<!-- resources/views/persons/show.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

		<!-- Person Data -->
		<div class="form-group">
			<div class="col-sm-3 control-label">Imię</div>

			<div class="col-sm-9">
				{{ $person->firstname }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3 control-label">Nazwisko</div>

			<div class="col-sm-9">
				{{ $person->lastname }}
			</div>
		</div>

		<!-- Show Contacts Button -->
		<form action="{{ url('/person/'.$person->id.'/contacts') }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					<button type="submit" class="btn btn-default">
						<i class="fa fa-plus"></i> Kontakty
					</button>
				</div>
			</div>
		</form>
    </div>
    @yield('contacts')
@endsection
