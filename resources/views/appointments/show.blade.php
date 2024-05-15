@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Appointment {{ $appointment->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/appointments') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/appointments/' . $appointment->id . '/edit') }}" title="Edit Appointment"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('appointments' . '/' . $appointment->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Appointment" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $appointment->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $appointment->title }} </td></tr><tr><th> Detail </th><td> {{ $appointment->detail }} </td></tr><tr><th> Photo </th><td> {{ $appointment->photo }} </td></tr><tr><th> Type </th><td> {{ $appointment->type }} </td></tr><tr><th> Training Type Id </th><td> {{ $appointment->training_type_id }} </td></tr><tr><th> All Day </th><td> {{ $appointment->all_day }} </td></tr><tr><th> Date Start </th><td> {{ $appointment->date_start }} </td></tr><tr><th> Date End </th><td> {{ $appointment->date_end }} </td></tr><tr><th> Time Start </th><td> {{ $appointment->time_start }} </td></tr><tr><th> Time End </th><td> {{ $appointment->time_end }} </td></tr><tr><th> User Like </th><td> {{ $appointment->user_like }} </td></tr><tr><th> User Dislike </th><td> {{ $appointment->user_dislike }} </td></tr><tr><th> User Share </th><td> {{ $appointment->user_share }} </td></tr><tr><th> User Fav </th><td> {{ $appointment->user_fav }} </td></tr><tr><th> Location Detail </th><td> {{ $appointment->location_detail }} </td></tr><tr><th> Link Map </th><td> {{ $appointment->link_map }} </td></tr><tr><th> Link Out </th><td> {{ $appointment->link_out }} </td></tr><tr><th> Click Link Out </th><td> {{ $appointment->click_link_out }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
