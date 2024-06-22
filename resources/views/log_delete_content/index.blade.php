@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Log_delete_content</div>
                    <div class="card-body">
                        <a href="{{ url('/log_delete_content/create') }}" class="btn btn-success btn-sm" title="Add New Log_delete_content">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/log_delete_content') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Type</th><th>User Id</th><th>News Name</th><th>Training Name</th><th>Product Name</th><th>Appointment Name</th><th>Activity Name</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($log_delete_content as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->type }}</td><td>{{ $item->user_id }}</td><td>{{ $item->news_name }}</td><td>{{ $item->training_name }}</td><td>{{ $item->product_name }}</td><td>{{ $item->appointment_name }}</td><td>{{ $item->activity_name }}</td>
                                        <td>
                                            <a href="{{ url('/log_delete_content/' . $item->id) }}" title="View Log_delete_content"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/log_delete_content/' . $item->id . '/edit') }}" title="Edit Log_delete_content"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/log_delete_content' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Log_delete_content" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $log_delete_content->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
