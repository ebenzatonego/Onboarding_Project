@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Calendar {{ $calendar->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/calendars') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/calendars/' . $calendar->id . '/edit') }}" title="Edit Calendar"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('calendars' . '/' . $calendar->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Calendar" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $calendar->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $calendar->title }} </td></tr><tr><th> Type </th><td> {{ $calendar->type }} </td></tr><tr><th> User Id </th><td> {{ $calendar->user_id }} </td></tr><tr><th> All Day </th><td> {{ $calendar->all_day }} </td></tr><tr><th> Date Start </th><td> {{ $calendar->date_start }} </td></tr><tr><th> Date End </th><td> {{ $calendar->date_end }} </td></tr><tr><th> Time Start </th><td> {{ $calendar->time_start }} </td></tr><tr><th> Time End </th><td> {{ $calendar->time_end }} </td></tr><tr><th> Training Id </th><td> {{ $calendar->training_id }} </td></tr><tr><th> Appointment Id </th><td> {{ $calendar->appointment_id }} </td></tr><tr><th> Activity Id </th><td> {{ $calendar->activity_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
