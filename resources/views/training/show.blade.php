@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Training {{ $training->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/training') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/training/' . $training->id . '/edit') }}" title="Edit Training"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('training' . '/' . $training->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Training" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $training->id }}</td>
                                    </tr>
                                    <tr><th> Name Article </th><td> {{ $training->name_article }} </td></tr><tr><th> Type Article </th><td> {{ $training->type_article }} </td></tr><tr><th> Start Date </th><td> {{ $training->start_date }} </td></tr><tr><th> End Date </th><td> {{ $training->end_date }} </td></tr><tr><th> Start Time </th><td> {{ $training->start_time }} </td></tr><tr><th> End Time </th><td> {{ $training->end_time }} </td></tr><tr><th> Check All Day Start </th><td> {{ $training->check_all_day_start }} </td></tr><tr><th> Check All Day End </th><td> {{ $training->check_all_day_end }} </td></tr><tr><th> Detail </th><td> {{ $training->detail }} </td></tr><tr><th> Photo </th><td> {{ $training->photo }} </td></tr><tr><th> Link Video </th><td> {{ $training->link_video }} </td></tr><tr><th> Link Lms </th><td> {{ $training->link_lms }} </td></tr><tr><th> Like </th><td> {{ $training->like }} </td></tr><tr><th> Fav </th><td> {{ $training->fav }} </td></tr><tr><th> Share </th><td> {{ $training->share }} </td></tr><tr><th> User View </th><td> {{ $training->user_view }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
