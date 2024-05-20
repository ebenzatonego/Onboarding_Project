@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Contact_group_manager {{ $contact_group_manager->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/contact_group_managers') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/contact_group_managers/' . $contact_group_manager->id . '/edit') }}" title="Edit Contact_group_manager"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('contact_group_managers' . '/' . $contact_group_manager->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact_group_manager" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $contact_group_manager->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $contact_group_manager->name }} </td></tr><tr><th> Nickname </th><td> {{ $contact_group_manager->nickname }} </td></tr><tr><th> Account </th><td> {{ $contact_group_manager->account }} </td></tr><tr><th> Organization Name </th><td> {{ $contact_group_manager->organization_name }} </td></tr><tr><th> Phone </th><td> {{ $contact_group_manager->phone }} </td></tr><tr><th> Email </th><td> {{ $contact_group_manager->email }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
