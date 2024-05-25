@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Video_congrats_type_rank {{ $video_congrats_type_rank->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/video_congrats_type_ranks') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/video_congrats_type_ranks/' . $video_congrats_type_rank->id . '/edit') }}" title="Edit Video_congrats_type_rank"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('video_congrats_type_ranks' . '/' . $video_congrats_type_rank->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Video_congrats_type_rank" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $video_congrats_type_rank->id }}</td>
                                    </tr>
                                    <tr><th> Name Rank </th><td> {{ $video_congrats_type_rank->name_rank }} </td></tr><tr><th> Check Active </th><td> {{ $video_congrats_type_rank->check_active }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
