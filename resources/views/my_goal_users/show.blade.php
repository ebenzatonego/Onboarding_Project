@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">My_goal_user {{ $my_goal_user->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/my_goal_users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/my_goal_users/' . $my_goal_user->id . '/edit') }}" title="Edit My_goal_user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('my_goal_users' . '/' . $my_goal_user->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete My_goal_user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $my_goal_user->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $my_goal_user->user_id }} </td></tr><tr><th> My Goals Type Id </th><td> {{ $my_goal_user->my_goals_type_id }} </td></tr><tr><th> Date Start </th><td> {{ $my_goal_user->date_start }} </td></tr><tr><th> Date End </th><td> {{ $my_goal_user->date_end }} </td></tr><tr><th> Period </th><td> {{ $my_goal_user->period }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
