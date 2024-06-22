@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Log_delete_content {{ $log_delete_content->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/log_delete_content') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/log_delete_content/' . $log_delete_content->id . '/edit') }}" title="Edit Log_delete_content"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('log_delete_content' . '/' . $log_delete_content->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Log_delete_content" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $log_delete_content->id }}</td>
                                    </tr>
                                    <tr><th> Type </th><td> {{ $log_delete_content->type }} </td></tr><tr><th> User Id </th><td> {{ $log_delete_content->user_id }} </td></tr><tr><th> News Name </th><td> {{ $log_delete_content->news_name }} </td></tr><tr><th> Training Name </th><td> {{ $log_delete_content->training_name }} </td></tr><tr><th> Product Name </th><td> {{ $log_delete_content->product_name }} </td></tr><tr><th> Appointment Name </th><td> {{ $log_delete_content->appointment_name }} </td></tr><tr><th> Activity Name </th><td> {{ $log_delete_content->activity_name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
