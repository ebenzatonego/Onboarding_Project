@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Log_video_news {{ $log_video_news->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/log_video_news') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/log_video_news/' . $log_video_news->id . '/edit') }}" title="Edit Log_video_news"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('log_video_news' . '/' . $log_video_news->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Log_video_news" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $log_video_news->id }}</td>
                                    </tr>
                                    <tr><th> News Id </th><td> {{ $log_video_news->news_id }} </td></tr><tr><th> User Id </th><td> {{ $log_video_news->user_id }} </td></tr><tr><th> Log </th><td> {{ $log_video_news->log }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
