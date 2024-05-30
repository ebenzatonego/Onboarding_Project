@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Log_excel_user {{ $log_excel_user->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/log_excel_users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/log_excel_users/' . $log_excel_user->id . '/edit') }}" title="Edit Log_excel_user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('log_excel_users' . '/' . $log_excel_user->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Log_excel_user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $log_excel_user->id }}</td>
                                    </tr>
                                    <tr><th> Name File </th><td> {{ $log_excel_user->name_file }} </td></tr><tr><th> Link File </th><td> {{ $log_excel_user->link_file }} </td></tr><tr><th> User Id </th><td> {{ $log_excel_user->user_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
