<!-- resources/views/persons/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- Update Person Form -->
        <form action="{{ url('person/'.$person->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Person Data -->
            <div class="form-group">
                <label for="person-firstname" class="col-sm-3 control-label">Imię</label>

                <div class="col-sm-6">
                    <input type="text" name="firstname" id="person-firstname" class="form-control" value="{{ $person->firstname }}">
                </div>
            </div>
            <div class="form-group">
                <label for="person-lastname" class="col-sm-3 control-label">Nazwisko</label>

                <div class="col-sm-6">
                    <input type="text" name="lastname" id="person-lastname" class="form-control" value="{{ $person->lastname }}">
                </div>
            </div>

            <!-- Update Person Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-floppy-o"></i> Zapisz
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
