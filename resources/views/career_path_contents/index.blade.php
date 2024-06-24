@extends('layouts.theme_admin')

@section('content')

    <div class="container-filde">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Career_path_contents</div>
                    <div class="card-body">
                        <a href="{{ url('/career_path_contents/create') }}" class="btn btn-success btn-sm" title="Add New Career_path_content">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/career_path_contents') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Career Path Id</th><th>Title</th><th>Icon</th><th>Read</th><th>Recommend</th><th>Detail</th><th>Pdf File</th><th>Photo</th><th>Video</th><th>Number</th><th>User Download Pdf</th><th>User View</th><th>Log Video</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($career_path_contents as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->career_path_id }}</td><td>{{ $item->title }}</td><td>{{ $item->icon }}</td><td>{{ $item->read }}</td><td>{{ $item->recommend }}</td><td>{{ $item->detail }}</td><td>{{ $item->pdf_file }}</td><td>{{ $item->photo }}</td><td>{{ $item->video }}</td><td>{{ $item->number }}</td><td>{{ $item->user_download_pdf }}</td><td>{{ $item->user_view }}</td><td>{{ $item->log_video }}</td>
                                        <td>
                                            <a href="{{ url('/career_path_contents/' . $item->id) }}" title="View Career_path_content"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/career_path_contents/' . $item->id . '/edit') }}" title="Edit Career_path_content"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/career_path_contents' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Career_path_content" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $career_path_contents->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
