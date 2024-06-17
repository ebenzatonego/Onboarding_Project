@extends('layouts.theme_admin')

@section('content')
    <div class="container-fields">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Activitys</div>
                    <div class="card-body">
                        <a href="{{ url('/activitys/create') }}" class="btn btn-success btn-sm" title="Add New Activity">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/activitys') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Title</th><th>Detail</th><th>Photo</th><th>Activity Type Id</th><th>All Day</th><th>Date Start</th><th>Date End</th><th>Time Start</th><th>Time End</th><th>Location Detail</th><th>Link Map</th><th>User Like</th><th>User Dislike</th><th>User Share</th><th>User Fav</th><th>User View</th><th>Sum Rating</th><th>Log Rating</th><th>Highlight Number</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($activitys as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td><td>{{ $item->detail }}</td><td>{{ $item->photo }}</td><td>{{ $item->activity_type_id }}</td><td>{{ $item->all_day }}</td><td>{{ $item->date_start }}</td><td>{{ $item->date_end }}</td><td>{{ $item->time_start }}</td><td>{{ $item->time_end }}</td><td>{{ $item->location_detail }}</td><td>{{ $item->link_map }}</td><td>{{ $item->user_like }}</td><td>{{ $item->user_dislike }}</td><td>{{ $item->user_share }}</td><td>{{ $item->user_fav }}</td><td>{{ $item->user_view }}</td><td>{{ $item->sum_rating }}</td><td>{{ $item->log_rating }}</td><td>{{ $item->highlight_number }}</td>
                                        <td>
                                            <a href="{{ url('/activitys/' . $item->id) }}" title="View Activity"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/activitys/' . $item->id . '/edit') }}" title="Edit Activity"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/activitys' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Activity" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $activitys->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
