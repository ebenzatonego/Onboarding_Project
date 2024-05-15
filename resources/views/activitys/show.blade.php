@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Activity {{ $activity->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/activitys') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/activitys/' . $activity->id . '/edit') }}" title="Edit Activity"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('activitys' . '/' . $activity->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Activity" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $activity->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $activity->title }} </td></tr><tr><th> Detail </th><td> {{ $activity->detail }} </td></tr><tr><th> Photo </th><td> {{ $activity->photo }} </td></tr><tr><th> Activity Type Id </th><td> {{ $activity->activity_type_id }} </td></tr><tr><th> All Day </th><td> {{ $activity->all_day }} </td></tr><tr><th> Date Start </th><td> {{ $activity->date_start }} </td></tr><tr><th> Date End </th><td> {{ $activity->date_end }} </td></tr><tr><th> Time Start </th><td> {{ $activity->time_start }} </td></tr><tr><th> Time End </th><td> {{ $activity->time_end }} </td></tr><tr><th> Location Detail </th><td> {{ $activity->location_detail }} </td></tr><tr><th> Link Map </th><td> {{ $activity->link_map }} </td></tr><tr><th> User Like </th><td> {{ $activity->user_like }} </td></tr><tr><th> User Dislike </th><td> {{ $activity->user_dislike }} </td></tr><tr><th> User Share </th><td> {{ $activity->user_share }} </td></tr><tr><th> User Fav </th><td> {{ $activity->user_fav }} </td></tr><tr><th> User View </th><td> {{ $activity->user_view }} </td></tr><tr><th> Sum Rating </th><td> {{ $activity->sum_rating }} </td></tr><tr><th> Log Rating </th><td> {{ $activity->log_rating }} </td></tr><tr><th> Highlight Number </th><td> {{ $activity->highlight_number }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
