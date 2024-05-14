@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Training</div>
                    <div class="card-body">
                        <a href="{{ url('/training/create') }}" class="btn btn-success btn-sm" title="Add New Training">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/training') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Name Article</th><th>Type Article</th><th>Start Date</th><th>End Date</th><th>Start Time</th><th>End Time</th><th>Check All Day Start</th><th>Check All Day End</th><th>Detail</th><th>Photo</th><th>Link Video</th><th>Link Lms</th><th>Like</th><th>Fav</th><th>Share</th><th>User View</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($training as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name_article }}</td><td>{{ $item->type_article }}</td><td>{{ $item->start_date }}</td><td>{{ $item->end_date }}</td><td>{{ $item->start_time }}</td><td>{{ $item->end_time }}</td><td>{{ $item->check_all_day_start }}</td><td>{{ $item->check_all_day_end }}</td><td>{{ $item->detail }}</td><td>{{ $item->photo }}</td><td>{{ $item->link_video }}</td><td>{{ $item->link_lms }}</td><td>{{ $item->like }}</td><td>{{ $item->fav }}</td><td>{{ $item->share }}</td><td>{{ $item->user_view }}</td>
                                        <td>
                                            <a href="{{ url('/training/' . $item->id) }}" title="View Training"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/training/' . $item->id . '/edit') }}" title="Edit Training"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/training' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Training" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $training->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
