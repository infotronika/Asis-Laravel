@extends('layouts.app')

@section('content')
    <!-- Create Task Form... -->

    <!-- Current Tasks -->
    @if (count($persons) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Persons
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
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
                                    <!-- TODO: Delete Button -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection