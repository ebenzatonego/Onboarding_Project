@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Calendars</div>
                    <div class="card-body">
                        <a href="{{ url('/calendars/create') }}" class="btn btn-success btn-sm" title="Add New Calendar">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/calendars') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Title</th><th>Type</th><th>User Id</th><th>All Day</th><th>Date Start</th><th>Date End</th><th>Time Start</th><th>Time End</th><th>Training Id</th><th>Appointment Id</th><th>Activity Id</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($calendars as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td><td>{{ $item->type }}</td><td>{{ $item->user_id }}</td><td>{{ $item->all_day }}</td><td>{{ $item->date_start }}</td><td>{{ $item->date_end }}</td><td>{{ $item->time_start }}</td><td>{{ $item->time_end }}</td><td>{{ $item->training_id }}</td><td>{{ $item->appointment_id }}</td><td>{{ $item->activity_id }}</td>
                                        <td>
                                            <a href="{{ url('/calendars/' . $item->id) }}" title="View Calendar"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/calendars/' . $item->id . '/edit') }}" title="Edit Calendar"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/calendars' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Calendar" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $calendars->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
