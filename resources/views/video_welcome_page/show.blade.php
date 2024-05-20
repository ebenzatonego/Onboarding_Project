@extends('layouts.theme_admin')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Video_welcome_page {{ $video_welcome_page->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/video_welcome_page') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/video_welcome_page/' . $video_welcome_page->id . '/edit') }}" title="Edit Video_welcome_page"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('video_welcome_page' . '/' . $video_welcome_page->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Video_welcome_page" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $video_welcome_page->id }}</td>
                                    </tr>
                                    <tr><th> Name Video </th><td> {{ $video_welcome_page->name_video }} </td></tr><tr><th> Type </th><td> {{ $video_welcome_page->type }} </td></tr><tr><th> User Id </th><td> {{ $video_welcome_page->user_id }} </td></tr><tr><th> Status </th><td> {{ $video_welcome_page->status }} </td></tr><tr><th> Log </th><td> {{ $video_welcome_page->log }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
