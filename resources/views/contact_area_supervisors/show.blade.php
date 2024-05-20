@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Contact_area_supervisor {{ $contact_area_supervisor->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/contact_area_supervisors') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/contact_area_supervisors/' . $contact_area_supervisor->id . '/edit') }}" title="Edit Contact_area_supervisor"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('contact_area_supervisors' . '/' . $contact_area_supervisor->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact_area_supervisor" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $contact_area_supervisor->id }}</td>
                                    </tr>
                                    <tr><th> Area </th><td> {{ $contact_area_supervisor->area }} </td></tr><tr><th> Name </th><td> {{ $contact_area_supervisor->name }} </td></tr><tr><th> Nickname </th><td> {{ $contact_area_supervisor->nickname }} </td></tr><tr><th> Account </th><td> {{ $contact_area_supervisor->account }} </td></tr><tr><th> Organization Name </th><td> {{ $contact_area_supervisor->organization_name }} </td></tr><tr><th> Phone </th><td> {{ $contact_area_supervisor->phone }} </td></tr><tr><th> Email </th><td> {{ $contact_area_supervisor->email }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
