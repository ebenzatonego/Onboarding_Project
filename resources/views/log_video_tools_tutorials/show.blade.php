@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Log_video_tools_tutorial {{ $log_video_tools_tutorial->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/log_video_tools_tutorials') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/log_video_tools_tutorials/' . $log_video_tools_tutorial->id . '/edit') }}" title="Edit Log_video_tools_tutorial"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('log_video_tools_tutorials' . '/' . $log_video_tools_tutorial->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Log_video_tools_tutorial" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $log_video_tools_tutorial->id }}</td>
                                    </tr>
                                    <tr><th> Tools Tutorial Id </th><td> {{ $log_video_tools_tutorial->tools_tutorial_id }} </td></tr><tr><th> User Id </th><td> {{ $log_video_tools_tutorial->user_id }} </td></tr><tr><th> Log </th><td> {{ $log_video_tools_tutorial->log }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
