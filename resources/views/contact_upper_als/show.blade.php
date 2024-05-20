@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Contact_upper_al {{ $contact_upper_al->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/contact_upper_als') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/contact_upper_als/' . $contact_upper_al->id . '/edit') }}" title="Edit Contact_upper_al"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('contact_upper_als' . '/' . $contact_upper_al->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact_upper_al" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $contact_upper_al->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $contact_upper_al->name }} </td></tr><tr><th> Nickname </th><td> {{ $contact_upper_al->nickname }} </td></tr><tr><th> Account </th><td> {{ $contact_upper_al->account }} </td></tr><tr><th> Organization Name </th><td> {{ $contact_upper_al->organization_name }} </td></tr><tr><th> Phone </th><td> {{ $contact_upper_al->phone }} </td></tr><tr><th> Email </th><td> {{ $contact_upper_al->email }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
