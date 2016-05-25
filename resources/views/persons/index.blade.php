<!-- resources/views/persons/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <!-- Current Persons -->
    @if (count($persons) > 0)
    <div class="panel-body col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                Osoby
            </div>

            <div class="panel-body">
                <table class="table table-striped person-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($persons as $person)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $person->firstname }}</div>
                                </td>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $person->lastname }}</div>
                                </td>

                                <td>
									<form action="{{ url('person/'.$person->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}

										<button type="submit" id="delete-person-{{ $person->id }}" class="btn btn-danger">
											<i class="fa fa-btn fa-trash"></i>Usuń
										</button>
									</form>
                                </td>
                                <td>
									<form action="{{ url('person/'.$person->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('PATCH') }}

										<button type="submit" id="edit-person-{{ $person->id }}" class="btn btn-danger">
											<i class="fa fa-btn fa-pencil-square"></i>Szczegóły
										</button>
									</form>
                                </td>
                                <td>
									<form action="{{ url('person/'.$person->id) }}" method="GET">
										{{ csrf_field() }}

										<button type="submit" id="edit-person-{{ $person->id }}" class="btn btn-danger">
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
    @endif

    <div class="panel-body col-sm-6">
        <!-- Display Validation Errors -->

        <!-- New Task Form -->
        <form action="{{ url('person') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="person-firstname" class="col-sm-3 control-label">Imię</label>

                <div class="col-sm-6">
                    <input type="text" name="firstname" id="person-firstname" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="person-lastname" class="col-sm-3 control-label">Nazwisko</label>

                <div class="col-sm-6">
                    <input type="text" name="lastname" id="person-lastname" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Dodaj osobę
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
