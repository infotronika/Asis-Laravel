<!-- resources/views/contacts/edit.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->

        <!-- Update Contact Form -->
        <form action="{{ url('person/'.$person->id.'/contact/'.$contact->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Contact Data -->
            <div class="form-group">
                <label for="contact-phone" class="col-sm-3 control-label">Telefon</label>

                <div class="col-sm-6">
                    <input type="text" name="phone" id="contact-phone" class="form-control" value="{{ $contact->phone }}">
                </div>
            </div>

            <!-- Update Contact Button -->
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
