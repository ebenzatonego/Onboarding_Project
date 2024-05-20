@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Content_popup {{ $content_popup->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/content_popups') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/content_popups/' . $content_popup->id . '/edit') }}" title="Edit Content_popup"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('content_popups' . '/' . $content_popup->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Content_popup" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $content_popup->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $content_popup->title }} </td></tr><tr><th> Detail </th><td> {{ $content_popup->detail }} </td></tr><tr><th> Photo </th><td> {{ $content_popup->photo }} </td></tr><tr><th> Video </th><td> {{ $content_popup->video }} </td></tr><tr><th> User Id </th><td> {{ $content_popup->user_id }} </td></tr><tr><th> Status </th><td> {{ $content_popup->status }} </td></tr><tr><th> Log Video </th><td> {{ $content_popup->log_video }} </td></tr><tr><th> User View </th><td> {{ $content_popup->user_view }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
